<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function index(){

        $data   =   User::all();
        $judul  =   'Data User';
        return view('user/data', compact('data','judul'));

    }

    public function tambah_user(){

        $judul  =   'Tambah Data User';
        return view('user/tambah', compact('judul'));

    }

    public function proses_tambah_user(Request $request){

        $data = User::create($request->all());
        return redirect()->route('user')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_user($id){

        $data   =   User::find($id);
        $judul  =   'Rubah Data User';
        return view('user/rubah', compact('data','judul'));

    }

    public function proses_rubah_user(Request $request, $id){

        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('user')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_user($id){

        $data = User::find($id);
        $data->delete();
        return redirect()->route('user')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_user(){

        return Excel::download(new UserExport, 'Daftar User Wakaf Salman.xlsx');

    }

    public function import_user(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataUser', $nama_file);

        Excel::import(new UserImport, \public_path('/DataUser/'.$nama_file));
        return \redirect()->back();

    }

}
