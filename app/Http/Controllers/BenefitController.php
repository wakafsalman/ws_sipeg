<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Exports\BenefitExport;
use App\Imports\BenefitImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class BenefitController extends Controller
{

    public function index(){

        $data   =   Benefit::all();
        $judul  =   'Data Benefit';
        return view('benefit/data', compact('data','judul'));

    }

    public function tambah_benefit(Request $request){

        $data = Benefit::create($request->all());
        return redirect()->route('benefit')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_benefit(Request $request, $id){

        $data = Benefit::find($id);
        $data->update($request->all());
        return redirect()->route('benefit')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_benefit($id){

        $data = Benefit::find($id);
        $data->delete();
        return redirect()->route('benefit')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_benefit(){

        return Excel::download(new BenefitExport, 'Daftar Benefit Wakaf Salman ITB.xlsx');

    }

    public function import_benefit(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataBenefit', $nama_file);

        Excel::import(new BenefitImport, \public_path('/DataBenefit/'.$nama_file));
        return \redirect()->back();

    }

}
