<?php

namespace App\Http\Controllers;

use App\Models\KodeKpi;
use App\Exports\KodeKpiExport;
use App\Imports\KodeKpiImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class KodeKpiController extends Controller
{

    public function index(){

        $data   =   KodeKpi::all();
        $judul  =   'Kode KPI';
        return view('kode_kpi/data', compact('data','judul'));

    }

    public function tambah_kode_kpi(Request $request){

        $data = KodeKpi::create($request->all());
        return redirect()->route('kode_kpi')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_kode_kpi(Request $request, $id){

        $data = KodeKpi::find($id);
        $data->update($request->all());
        return redirect()->route('kode_kpi')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_kode_kpi($id){

        $data = KodeKpi::find($id);
        $data->delete();
        return redirect()->route('kode_kpi')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_kode_kpi(){

        return Excel::download(new KodeKpiExport, 'Kode KPI.xlsx');

    }

    public function import_kode_kpi(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataKodeKpi', $nama_file);

        Excel::import(new KodeKpiImport, \public_path('/DataKodeKpi/'.$nama_file));
        return \redirect()->back();

    }

}
