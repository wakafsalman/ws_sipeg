<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;


class CutiController extends Controller
{
    //
    public function index(){

        $data       =   Cuti::where('id_users', auth()->user()->id_pegawais);
        $judul      =   'Pengajuan Cuti';
        $manager    =   Pegawai::whereIn('id_jabatans', [9, 10, 11, 12])
                                ->get();
        return view('izin/cuti', compact('data','judul','manager'));

    }

    public function input_cuti(Request $request){

        $data = Cuti::create($request->all());
        return redirect()->route('cuti')->with('success', 'Data berhasil ditambah');

    }


}
