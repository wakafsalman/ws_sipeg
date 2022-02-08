<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Exports\DivisiExport;
use App\Imports\DivisiImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class DivisiController extends Controller
{

    public function index(){

        $data   =   Divisi::all();
        $judul  =   'Data Divisi';
        return view('divisi/data', compact('data','judul'));

    }

    public function tambah_divisi(){

        $judul  =   'Tambah Data Divisi';
        return view('divisi/tambah', compact('judul'));

    }

    public function proses_tambah_divisi(Request $request){

        $data = Divisi::create($request->all());
        return redirect()->route('divisi')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_divisi($id){

        $data   =   Divisi::find($id);
        $judul  =   'Rubah Data Divisi';
        return view('divisi/rubah', compact('data','judul'));

    }

    public function proses_rubah_divisi(Request $request, $id){

        $data = Divisi::find($id);
        $data->update($request->all());
        return redirect()->route('divisi')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_divisi($id){

        $data = Divisi::find($id);
        $data->delete();
        return redirect()->route('divisi')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_divisi(){

        return Excel::download(new DivisiExport, 'Daftar Divisi di Wakaf Salman.xlsx');

    }

    public function import_divisi(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataDivisi', $nama_file);

        Excel::import(new DivisiImport, \public_path('/DataDivisi/'.$nama_file));
        return \redirect()->back();

    }

}
