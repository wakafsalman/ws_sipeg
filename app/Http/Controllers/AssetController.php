<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Exports\AssetExport;
use App\Imports\AssetImport;
use App\Models\AssetStock;
use App\Models\Satuan;
use App\Exports\SatuanExport;
use App\Imports\SatuanImport;
use App\Models\Pic;
use App\Exports\PicExport;
use App\Imports\PicImport;
use App\Models\Pengajuan;
use App\Models\ReportAsset;
use App\Exports\ReportAssetExport;
use App\Models\ReportStock;
use App\Exports\ReportStockExport;
use App\Models\Pegawai;
use App\Models\Bast;
use App\Models\Bapb;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
    
    //data aset
    public function index(){

        $judul      =   'Data Aset';
        $data       =   Asset::all();
        $pic        =   Pic::orderBy('nama','asc')->get();
        $satuan     =   Satuan::all();
        return view('aset/data', compact('judul','data','pic','satuan'));

    }

    public function tambah_aset(Request $request){

        $data = Asset::create($request->all());
        if($request->hasFile('gambar')){
            $gambar = $request->merk.".".$request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move('img/aset/', $gambar);
            $data->gambar = $gambar;
            $data->save();
        }
        return redirect()->route('aset')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_aset(Request $request, $id){

        $data = Asset::find($id);
        $data->update($request->all());
        if($request->hasFile('gambar')){
            $gambar = $request->merk.".".$request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move('img/aset/', $gambar);
            $data->gambar = $gambar;
            $data->save();
        }
        return redirect()->route('aset')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_aset($id){

        $data = Asset::find($id);
        $data->delete();
        return redirect()->route('aset')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_aset_pdf(){

        $data = Asset::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('aset/data_pdf');
        return $pdf->download('Daftar Aset Wakaf Salman.pdf');

    }

    public function eksport_aset(){

        return Excel::download(new AssetExport, 'Daftar Asset Wakaf Salman ITB.xlsx');

    }

    public function import_aset(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataAset', $nama_file);

        Excel::import(new AssetImport, \public_path('/DataAset/'.$nama_file));
        return \redirect()->back();

    }

    public function autocomplete_pic_data_aset(Request $request){

       return Pic::select("nama")
                ->where("nama","LIKE","%{$request->term}%")
                ->pluck("nama");
        
    }

    //data satuan
    public function satuan(){

        $data   =   Satuan::all();
        $judul  =   'Data Satuan';
        return view('aset/satuan/data', compact('data','judul'));

    }

    public function tambah_satuan(Request $request){

        $data = Satuan::create($request->all());
        return redirect()->route('satuan')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_satuan(Request $request, $id){

        $data = Satuan::find($id);
        $data->update($request->all());
        return redirect()->route('satuan')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_satuan($id){

        $data = Satuan::find($id);
        $data->delete();
        return redirect()->route('satuan')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_satuan(){

        return Excel::download(new SatuanExport, 'Daftar Satuan Aset Wakaf Salman ITB.xlsx');

    }

    public function import_satuan(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataSatuan', $nama_file);

        Excel::import(new SatuanImport, \public_path('/DataSatuan/'.$nama_file));
        return \redirect()->back();

    }

    //data pic
    public function pic(){

        $data   =   Pic::all();
        $judul  =   'Data PIC/Tempat';
        return view('aset/pic/data', compact('data','judul'));

    }

    public function tambah_pic(Request $request){

        $data = Pic::create($request->all());
        return redirect()->route('pic')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_pic(Request $request, $id){

        $data = Pic::find($id);
        $data->update($request->all());
        return redirect()->route('pic')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_pic($id){

        $data = Pic::find($id);
        $data->delete();
        return redirect()->route('pic')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_pic(){

        return Excel::download(new PicExport, 'Daftar PIC atau Tempat Wakaf Salman ITB.xlsx');

    }

    public function import_pic(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataPic', $nama_file);

        Excel::import(new PicImport, \public_path('/DataPic/'.$nama_file));
        return \redirect()->back();

    }

    //pengajuan
    public function pengajuan(){

        $date = new DateTime('now');

        $data       =   Pengajuan::where('id_users', auth()->user()->id_pegawais)
                            ->get();
        $judul      =   'Pengajuan Merchandise';
        $satuan     =   Satuan::all();
        $tanggal    =   $date->format('d-m-Y');
        return view('aset/pengajuan/data', compact('data','judul','satuan','tanggal'));        

    }

    public function proses_pengajuan(Request $request){

        $timezone   =   'Asia/Jakarta';
        $date       =   new DateTime('now', new DateTimeZone($timezone));
        $tanggal    =   $date->format('Y-m-d');
        $data       =   $request->all();

        if(count($data['assets']) > 0){
            foreach ($data['assets'] as $item => $value){
                $data2 = array(
                    'id_users'          =>  $request->id_users,
                    'id_jabatans'       =>  $request->id_jabatans,
                    'tanggal'           =>  $tanggal,
                    'assets'            =>  $data['assets'][$item],
                    'jumlah'            =>  $data['jumlah'][$item],
                    'satuan'            =>  $data['satuan'][$item],
                    'keterangan'        =>  $request->keterangan,        
                );
                Pengajuan::create($data2);    
            }
        }
 
        return redirect()->route('pengajuan')->with('success', 'Anda berhasil melakukan pengajuan barang, silahkan hubungi GA agar segera diproses');


    }

    public function rubah_pengajuan(Request $request, $id){

        $data = Pengajuan::find($id);
        $data->update($request->all());
        return redirect()->route('pengajuan')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_pengajuan($id){

        $data = Pengajuan::find($id);
        $data->delete();
        return redirect()->route('pengajuan')->with('success', 'Data berhasil dihapus');

    }

    public function setujui_pengajuan($id){

        $data = Pengajuan::find($id);
        $update_status=[
            'status' => 'Accepted'
        ];
        $data->update($update_status);
        return redirect()->route('pengajuan')->with('success', 'Data berhasil dirubah');

    }

    public function batalkan_pengajuan($id){

        $data = Pengajuan::find($id);
        $update_status=[
            'status' => 'Rejected'
        ];
        $data->update($update_status);
        return redirect()->route('pengajuan')->with('success', 'Data berhasil dirubah');

    }

    public function autocomplete_aset_pengajuan(Request $request){

        $aset = Asset::select("nama")
                    ->where("nama","LIKE","%{$request->term}%")
                    ->get();

        $data = array();
        foreach ($aset as $list_aset) {
                    $data[] = array('nama' => $list_aset->nama);
        }
        if(count($data)){
            return $data;
        }
         
    }
 
     //data laporan aset masuk
    public function aset_masuk(){

        $aset       =   Asset::all();
        $data       =   ReportAsset::all();
        $judul      =   'Laporan Aset Masuk';
        $satuan     =   Satuan::all();
        return view('aset/aset_masuk/data', compact('aset','data','judul','satuan'));

    }

    public function tambah_aset_masuk(Request $request){

        $data = $request->all();
        if(count($data['aset']) > 0){
            foreach ($data['aset'] as $item => $value){
                $data2 = array(
                    'tanggal'           =>  $request->tanggal,
                    'jenis_aset'        =>  $request->jenis_aset,
                    'aset'              =>  $data['aset'][$item],
                    'jumlah'            =>  $data['jumlah'][$item],
                    'satuan'            =>  $data['satuan'][$item],
                    'harga'             =>  $data['harga'][$item],
                    'tanggal_beli'      =>  $request->tanggal_beli,        
                );
                ReportAsset::create($data2);    
            }
        }
 
        return redirect()->route('aset_masuk')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_aset_masuk(Request $request, $id){

        $data = ReportAsset::find($id);
        $data->update($request->all());
        return redirect()->route('aset_masuk')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_aset_masuk($id){

        $data = ReportAsset::find($id);
        $data->delete();
        return redirect()->route('aset_masuk')->with('success', 'Data berhasil dihapus');

    }

    public function autocomplete_aset_masuk(Request $request){

        $aset = Asset::select("nama")
                    ->where("nama","LIKE","%{$request->term}%")
                    ->get();

        $data = array();
        foreach ($aset as $list_aset) {
                    $data[] = array('nama' => $list_aset->nama);
        }
        if(count($data)){
            return $data;
        }
         
    }
 
    //data Laporan Stock Opname 
    public function report_stock(){

        $aset       =   Asset::all();
        $data       =   ReportStock::all();
        $judul      =   'Laporan Stock Opname';
        $satuan     =   Satuan::all();
        return view('aset/report_stock/data', compact('aset','data','judul','satuan'));

    }

    public function tambah_report_stock(Request $request){


        $data = $request->all();
        $data['tanggal'] = Carbon::parse($request->tanggal)->locale('id');
        $data['tanggal']->settings(['formatFunction' => 'translatedFormat']);

        $tanggal_indo = $data['tanggal']->format('d F Y');
        if($request->hasFile('laporan')){
            $laporan = "StockOpname_".$tanggal_indo.".".$request->file('laporan')->getClientOriginalExtension();
            $request->file('laporan')->move('pdf/stock-opname/', $laporan);
        }
        ReportStock::create([
            'keterangan'            =>  $request->keterangan,
            'tanggal_indo'          =>  $request->tanggal,
            'tanggal'               =>  $request->tanggal,
            'status'                =>  $request->status,
            'file'                  =>  $laporan,
        ]);

        return redirect()->route('report_stock')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_report_stock(Request $request, $id){

        $ambil_data_tanggal = $request->all();
        $ambil_data_tanggal['tanggal'] = Carbon::parse($request->tanggal)->locale('id');
        $ambil_data_tanggal['tanggal']->settings(['formatFunction' => 'translatedFormat']);

        $tanggal_indo = $ambil_data_tanggal['tanggal']->format('d F Y');
        if($request->hasFile('laporan')){
            $laporan = "StockOpname_".$tanggal_indo.".".$request->file('laporan')->getClientOriginalExtension();
            $request->file('laporan')->move('pdf/stock-opname/', $laporan);

            $data = ReportStock::find($id);
            $stock_opname_update=[
                'keterangan'            =>  $request->keterangan,
                'tanggal_indo'          =>  $request->tanggal,
                'tanggal'               =>  $request->tanggal,
                'status'                =>  $request->status,
                'file'                  =>  $laporan,
            ];
            $data->update($stock_opname_update);
        }else{
            $data = ReportStock::find($id);
            $stock_opname_update=[
                'keterangan'            =>  $request->keterangan,
                'tanggal_indo'          =>  $request->tanggal,
                'tanggal'               =>  $request->tanggal,
                'status'                =>  $request->status,
            ];
            $data->update($stock_opname_update);

        }


        return redirect()->route('report_stock')->with('success', 'Data berhasil dirubah');
    }

    public function hapus_report_stock($id){

        $data = ReportStock::find($id);
        $data->delete();
        return redirect()->route('report_stock')->with('success', 'Data berhasil dihapus');

    }

    //stock merchandise
    public function stock_merchandise(){

        $judul          = 'Stock Merchandise';
        $data           = Asset::where('jenis_aset','=','Merchandise')
                                ->get();
        $last_update    = Asset::select('updated_at')
                                ->orderBy('updated_at','desc')
                                ->first();

        $ambil_data_tanggal = Carbon::parse($last_update->updated_at)->locale('id');
        $ambil_data_tanggal->settings(['formatFunction' => 'translatedFormat']);

        $tanggal_indo = $ambil_data_tanggal->format('d F Y');
        return view('aset/stock/data', compact('judul','data','tanggal_indo'));
    }

    public function kelola_limit(Request $request, $id){

        $data = Asset::find($id);
        $data->update($request->all());
        return redirect()->route('stock_merchandise')->with('success', 'Limit berhasil diset');

    }

    public function hapus_stock_merchandise($id){

        $data = Asset::find($id);
        $data->delete();
        return redirect()->route('stock_merchandise')->with('success', 'Data berhasil dihapus');

    }

    //bast
    public function bast(){

        $judul      =   'Berita Acara Serah Terima Barang';
        $data       =   Bast::all();
        $pegawai    =   Pegawai::all();

        return view('aset/bast/data', compact('judul','data','pegawai'));

    }

    public function upload_bast(Request $request){

        $data = Bast::create($request->all());
        if($request->hasFile('file_surat')){

            $pisah_no_surat = explode('/', $request->no_surat);

            $bagian1 = $pisah_no_surat[0];
            $bagian2 = $pisah_no_surat[1];
            $bagian3 = $pisah_no_surat[2];
            $bagian4 = $pisah_no_surat[3];

            $bast = $bagian1."-".$bagian2."-".$bagian3."-".$bagian4.".".$request->file('file_surat')->getClientOriginalExtension();
            $request->file('file_surat')->move('pdf/bast/', $bast);
            $data->file_surat = $bast;
            $data->save();
        }
        return redirect()->route('bast')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_bast(Request $request, $id){

        $data = Bast::find($id);
        $data->update($request->all());
        if($request->hasFile('file_surat')){
            $pisah_no_surat = explode('/', $request->no_surat);

            $bagian1 = $pisah_no_surat[0];
            $bagian2 = $pisah_no_surat[1];
            $bagian3 = $pisah_no_surat[2];
            $bagian4 = $pisah_no_surat[3];

            $bast = $bagian1."-".$bagian2."-".$bagian3."-".$bagian4.".".$request->file('file_surat')->getClientOriginalExtension();
            $request->file('file_surat')->move('pdf/bast/', $bast);
            $data->file_surat = $bast;
            $data->save();
        }
        return redirect()->route('bast')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_bast($id){

        $data = Bast::find($id);
        $data->delete();
        return redirect()->route('bast')->with('success', 'Data berhasil dihapus');

    }

    //bapb
    public function bapb(){

        $judul      =   'Berita Acara Serah Terima Barang';
        $data       =   Bapb::all();
        $pegawai    =   Pegawai::all();

        return view('aset/bapb/data', compact('judul','data','pegawai'));

    }

    public function upload_bapb(Request $request){

        $data = Bapb::create($request->all());
        if($request->hasFile('file_surat')){

            $pisah_no_surat = explode('/', $request->no_surat);

            $bagian1 = $pisah_no_surat[0];
            $bagian2 = $pisah_no_surat[1];
            $bagian3 = $pisah_no_surat[2];
            $bagian4 = $pisah_no_surat[3];

            $bapb = $bagian1."-".$bagian2."-".$bagian3."-".$bagian4.".".$request->file('file_surat')->getClientOriginalExtension();
            $request->file('file_surat')->move('pdf/bapb/', $bapb);
            $data->file_surat = $bapb;
            $data->save();
        }
        return redirect()->route('bapb')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_bapb(Request $request, $id){

        $data = Bapb::find($id);
        $data->update($request->all());
        if($request->hasFile('file_surat')){
            $pisah_no_surat = explode('/', $request->no_surat);

            $bagian1 = $pisah_no_surat[0];
            $bagian2 = $pisah_no_surat[1];
            $bagian3 = $pisah_no_surat[2];
            $bagian4 = $pisah_no_surat[3];

            $bapb = $bagian1."-".$bagian2."-".$bagian3."-".$bagian4.".".$request->file('file_surat')->getClientOriginalExtension();
            $request->file('file_surat')->move('pdf/bapb/', $bapb);
            $data->file_surat = $bapb;
            $data->save();
        }
        return redirect()->route('bapb')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_bapb($id){

        $data = Bapb::find($id);
        $data->delete();
        return redirect()->route('bapb')->with('success', 'Data berhasil dihapus');

    }



}
