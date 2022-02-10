<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class AbsensiController extends Controller
{
    //
    public function index(){

        $judul  =   'Rekap Absensi WFH Pegawai Wakaf Salman ITB';
        return view('absensi/rekap', compact('judul'));

    }

    public function absen(){

        $judul  =   'Absensi WFH';
        $data   =   Absensi::all();
        return view('absensi/absen', compact('judul','data'));

    }

    public function absen_masuk(){

        $date = new DateTime('now');

        $judul      =   'Absensi Masuk WFH';
        $tanggal    =   $date->format('d-m-Y');
        return view('absensi/absen-masuk', compact('judul','tanggal'));

    }

    public function proses_absen_masuk(Request $request){

        $timezone   =   'Asia/Jakarta';
        $date       =   new DateTime('now', new DateTimeZone($timezone));
        $tanggal    =   $date->format('Y-m-d');
        $localtime  =   $date->format('H:i:s');

        Absensi::create([
            'id_users'      =>  auth()->user()->id_pegawais,
            'tanggal'       =>  $tanggal,
            'jam_masuk'     =>  $localtime,
            'rencana_kerja' =>  $request->rencana_kerja,
        ]);

        return redirect()->route('absen')->with('success', 'Anda berhasil mengisi absen masuk WFH. Selamat bekerja :) tetap jaga prokes dan kesehatan');
    }

    public function absen_keluar(){

        return view('absensi/absen-keluar');
        
    }

}
