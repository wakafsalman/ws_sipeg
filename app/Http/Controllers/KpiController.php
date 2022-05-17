<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\KodeKpi;
use App\Models\Jabatan;
use App\Exports\KpiExport;
use App\Imports\KpiImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class KpiController extends Controller
{

    public function index(){

        $data       =   Kpi::all();
        $jabatan    =   Jabatan::all();
        $judul      =   'Key Performance Indicator (KPI)';
        $kode_kpi   =   KodeKpi::all();
        return view('kpi/data', compact('data','jabatan','judul','kode_kpi'));

    }

    public function tambah_kpi(Request $request){

        $data = Kpi::create($request->all());
        return redirect()->route('kpi')->with('success', 'Data berhasil ditambah');

    }

    /*
    public function input_kpi(){

        $jabatan    =   Jabatan::all();
        $kode_kpi   =   KodeKpi::all();
        $judul      =   'Tambah KPI';
        return view('kpi/input', compact('jabatan','kode_kpi','judul'));

    }

    public function tambah_kpi(Request $request){

        $data = $request->all();

        $tahun = Carbon::now()->format('Y');

        $cek_data = Kpi::where('no_kpi','like','%KPI'.$tahun.'%')->get();

        $cek = count($cek_data);

        if($cek == 0){
            $angka = sprintf("%04s", 1);
            $no_kpi = "KPI".$tahun."-".$angka;          
        }else{
            $angka = sprintf("%04s", $cek + 1);
            $no_kpi = "KPI".$tahun."-".$angka;
        }
        

        if(count($data['target']) > 0){
            foreach($data['target'] as $item => $value){
                $data_kpi = array(
                    'id_jabatans'       =>  $request->id_jabatans,
                    'id_kode_kpis'      =>  $data['id_kode_kpis'][$item],
                    'no_kpi'            =>  $no_kpi,
                    'target'            =>  $data['target'][$item],
                    'progress'          =>  $data['progress'][$item],
                    'kendala'           =>  $data['kendala'][$item],
                );
                Kpi::create($data_kpi);
            }
        }

        return redirect()->route('kpi')->with('success', 'Data berhasil ditambah');

    }
    */

    public function rubah_kpi(Request $request, $id){

        $data = Kpi::find($id);
        $data->update($request->all());
        return redirect()->route('kpi')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_kpi($id){

        $data = Kpi::find($id);
        $data->delete();
        return redirect()->route('kpi')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_kpi(){

        return Excel::download(new KpiExport, 'KPI.xlsx');

    }

    public function import_kpi(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataKpi', $nama_file);

        Excel::import(new KpiImport, \public_path('/DataKpi/'.$nama_file));
        return \redirect()->back();

    }

}
