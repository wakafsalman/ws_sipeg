<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    //
    public function index(){

        $judul  =   'Rekap Absensi WFH Pegawai Wakaf Salman ITB';
        return view('absensi/rekap', compact('judul'));

    }

    public function absen(){

        $judul  =   'Absensi WFH';
        return view('absensi/absen', compact('judul'));

    }

}
