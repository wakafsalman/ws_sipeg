<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Pegawai;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        $judul      =   'Tambah Data User';
        $role_user  =   Role::all();
        $pegawai    =   Pegawai::all();
        return view('user/tambah', compact('judul','role_user','pegawai'));

    }

    public function proses_tambah_user(Request $request){

        $data = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'id_roles' => $request->id_roles,
            'id_pegawais' => $request->id_pegawais,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect()->route('user')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_user($id){

        $data       =   User::find($id);
        $judul      =   'Rubah Data User';
        $role_user  =   Role::all();
        $pegawai    =   Pegawai::all();
        return view('user/rubah', compact('data','judul','role_user','pegawai'));

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
