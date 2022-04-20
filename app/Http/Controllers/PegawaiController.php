<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{

    public function index(){

        if(in_array(auth()->user()->id, [1, 7, 16, 17])){
            $judul      =   'Data Pegawai';
            $data       =   Pegawai::all();
        }else{
            $judul      =   'Data Pribadi';
            $data       =   Pegawai::where('id', auth()->user()->id_pegawais)->get();
        }
        $jabatan    =   Jabatan::all();
        $divisi     =   Divisi::all();
        return view('pegawai/data', compact('judul','data','jabatan','divisi'));

    }

    public function tambah_pegawai(Request $request){

        $data = Pegawai::create($request->all());
        if($request->hasFile('foto')){
            $gambar = $request->nama.".".$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('img/pegawai/', $gambar);
            $data->foto = $gambar;
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_pegawai(Request $request, $id){

        $data = Pegawai::find($id);
        $data->update($request->all());
        if($request->hasFile('foto')){
            $gambar = $request->nama.".".$request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('img/pegawai/', $gambar);
            $data->foto = $gambar;
            $data->save();
        }
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

        return Excel::download(new PegawaiExport, 'Daftar Karyawan Wakaf Salman ITB.xlsx');

    }

    public function import_pegawai(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataPegawai', $nama_file);

        Excel::import(new PegawaiImport, \public_path('/DataPegawai/'.$nama_file));
        return \redirect()->back();

    }

}
