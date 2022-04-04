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

class KpiController extends Controller
{

    public function index(){

        $data       =   Kpi::all();
        $judul      =   'Key Performance Indicator (KPI)';
        return view('kpi/data', compact('data','judul'));

    }

    public function input_kpi(){

        $jabatan    =   Jabatan::all();
        $kode_kpi   =   KodeKpi::all();
        $judul      =   'Tambah KPI';
        return view('kpi/input', compact('jabatan','kode_kpi','judul'));

    }

    public function tambah_kpi(Request $request){

        $data = Kpi::create($request->all());
        return redirect()->route('kpi')->with('success', 'Data berhasil ditambah');

    }

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
