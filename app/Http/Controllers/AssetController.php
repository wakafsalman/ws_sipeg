<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Exports\AssetExport;
use App\Imports\AssetImport;
use App\Models\Satuan;
use App\Exports\SatuanExport;
use App\Imports\SatuanImport;
use App\Models\Pegawai;
use App\Models\Pengajuan;
use App\Models\ReportAsset;
use App\Exports\ReportAssetExport;
use App\Models\ReportStock;
use App\Exports\ReportStockExport;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class AssetController extends Controller
{
    
    //data aset
    public function index(){

        $judul      =   'Data Aset';
        $data       =   Asset::all();
        $pegawai    =   Pegawai::orderBy('nama','asc')->get();
        $satuan     =   Satuan::all();
        return view('aset/data', compact('judul','data','pegawai','satuan'));

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

    //pengajuan
    public function pengajuan(){

        $date = new DateTime('now');

        $aset       =   Asset::all();
        $data       =   Pengajuan::where('id_users', auth()->user()->id_pegawais)
                            ->get();
        $judul      =   'Pengajuan Aset';
        $satuan     =   Satuan::all();
        $tanggal    =   $date->format('d-m-Y');
        return view('aset/pengajuan/data', compact('aset','data','judul','satuan','tanggal'));        

    }

    public function proses_pengajuan(Request $request){

        $timezone   =   'Asia/Jakarta';
        $date       =   new DateTime('now', new DateTimeZone($timezone));
        $tanggal    =   $date->format('Y-m-d');

        Pengajuan::create([
            'id_users'          =>  $request->id_users,
            'id_jabatans'       =>  $request->id_jabatans,
            'tanggal'           =>  $tanggal,
            'id_assets'         =>  $request->id_assets,
            'jumlah'            =>  $request->jumlah,
            'satuan'            =>  $request->satuan,
            'keterangan'        =>  $request->keterangan,
        ]);

        return redirect()->route('pengajuan')->with('success', 'Anda berhasil melakukan pengajuan barang, silahkan hubungi GA agar segera diproses');


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

        $data = ReportAsset::create($request->all());
        return redirect()->route('aset_masuk')->with('success', 'Data berhasil ditambah');

    }

    public function eksport_aset_masuk_pdf(){

        $data = ReportAsset::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('aset/aset_masuk/data_pdf');
        return $pdf->download('Laporan Aset Masuk Wakaf Salman.pdf');

    }

    public function eksport_aset_masuk(){

        return Excel::download(new ReportAssetExport, 'Laporan Aset Masuk Wakaf Salman ITB.xlsx');

    }

    //data laporan stok aset
    public function report_stock(){

        $aset       =   Asset::all();
        $data       =   ReportStock::all();
        $judul      =   'Laporan Stok Aset';
        $satuan     =   Satuan::all();
        return view('aset/report_stock/data', compact('aset','data','judul','satuan'));

    }

    public function tambah_report_stock(Request $request){

        $data = ReportStock::create($request->all());
        return redirect()->route('report_stock')->with('success', 'Data berhasil ditambah');

    }

    public function eksport_report_stock_pdf(){

        $data = ReportStock::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('aset/report_stock/data_pdf');
        return $pdf->download('Laporan Stok Aset Wakaf Salman.pdf');

    }

    public function eksport_report_stock(){

        return Excel::download(new ReportStockExport, 'Laporan Stok Aset Wakaf Salman ITB.xlsx');

    }


}
