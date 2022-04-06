<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Exports\DonaturExport;
use App\Imports\DonaturImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DonaturController extends Controller
{

    public function index(){

        $judul      =   'Data Donatur';
        $data       =   Donatur::all();
        return view('donatur/data', compact('judul','data'));

    }

    public function tambah_donatur(Request $request){

        $data = Donatur::create($request->all());
        return redirect()->route('donatur')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_donatur(Request $request, $id){

        $data = Donatur::find($id);
        $data->update($request->all());
        return redirect()->route('donatur')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_donatur($id){

        $data = Donatur::find($id);
        $data->delete();
        return redirect()->route('donatur')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_donatur(){

        return Excel::download(new DonaturExport, 'Daftar Donatur Wakaf Salman ITB.xlsx');

    }

    public function import_donatur(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataDonatur', $nama_file);

        Excel::import(new DonaturImport, \public_path('/DonaturPegawai/'.$nama_file));
        return \redirect()->back();

    }

}
