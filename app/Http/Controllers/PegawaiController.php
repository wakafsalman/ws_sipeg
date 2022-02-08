<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{

    public function index(){

        $data   =   Pegawai::all();
        $judul  =   'Data Pegawai';
        return view('pegawai/data', compact('data','judul'));

    }

    public function tambah_pegawai(){

        $judul  =   'Tambah Data Pegawai';
        return view('pegawai/tambah', compact('judul'));

    }

    public function proses_tambah_pegawai(Request $request){

        $data = Pegawai::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('img/pegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_pegawai($id){

        $data   =   Pegawai::find($id);
        $judul  =   'Rubah Data Pegawai';
        return view('pegawai/rubah', compact('data','judul'));

    }

    public function proses_rubah_pegawai(Request $request, $id){

        $data = Pegawai::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_pegawai($id){

        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_pdf(){

        $data = Pegawai::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('pegawai/data_pdf');
        return $pdf->download('Daftar Karyawan Wakaf Salman.pdf');

    }

    public function eksport_pegawai(){

        return Excel::download(new PegawaiExport, 'Daftar Karyawan Wakaf Salman.xlsx');

    }

    public function import_pegawai(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataPegawai', $nama_file);

        Excel::import(new PegawaiImport, \public_path('/DataPegawai/'.$nama_file));
        return \redirect()->back();

    }

}
