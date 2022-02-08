<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Exports\RoleExport;
use App\Imports\RoleImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{

    public function index(){

        $data   =   Role::all();
        $judul  =   'Data Role User';
        return view('role/data', compact('data','judul'));

    }

    public function tambah_role_user(){

        $judul  =   'Tambah Data Role User';
        return view('role/tambah', compact('judul'));

    }

    public function proses_tambah_role_user(Request $request){

        $data = Role::create($request->all());
        return redirect()->route('role_user')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_role_user($id){

        $data   =   Role::find($id);
        $judul  =   'Rubah Data Role User';
        return view('role/rubah', compact('data','judul'));

    }

    public function proses_rubah_role_user(Request $request, $id){

        $data = Role::find($id);
        $data->update($request->all());
        return redirect()->route('role_user')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_role_user($id){

        $data = Role::find($id);
        $data->delete();
        return redirect()->route('role_user')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_role_user(){

        return Excel::download(new RoleExport, 'Daftar Role User di Wakaf Salman.xlsx');

    }

    public function import_role_user(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataRole', $nama_file);

        Excel::import(new RoleImport, \public_path('/DataRole/'.$nama_file));
        return \redirect()->back();

    }

}
