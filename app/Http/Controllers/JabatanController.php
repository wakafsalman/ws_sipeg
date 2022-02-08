<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Exports\JabatanExport;
use App\Imports\JabatanImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class JabatanController extends Controller
{

    public function index(){

        $data   =   Jabatan::all();
        $judul  =   'Data Jabatan';
        return view('jabatan/data', compact('data','judul'));

    }

    public function tambah_jabatan(){

        $judul  =   'Tambah Data Jabatan';
        return view('jabatan/tambah', compact('judul'));

    }

    public function proses_tambah_jabatan(Request $request){

        $data = Jabatan::create($request->all());
        return redirect()->route('jabatan')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_jabatan($id){

        $data   =   Jabatan::find($id);
        $judul  =   'Rubah Data Jabatan';
        return view('jabatan/rubah', compact('data','judul'));

    }

    public function proses_rubah_jabatan(Request $request, $id){

        $data = Jabatan::find($id);
        $data->update($request->all());
        return redirect()->route('jabatan')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_jabatan($id){

        $data = Jabatan::find($id);
        $data->delete();
        return redirect()->route('jabatan')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_jabatan(){

        return Excel::download(new JabatanExport, 'Daftar Jabatan di Wakaf Salman.xlsx');

    }

    public function import_jabatan(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataJabatan', $nama_file);

        Excel::import(new JabatanImport, \public_path('/DataJabatan/'.$nama_file));
        return \redirect()->back();

    }

}
