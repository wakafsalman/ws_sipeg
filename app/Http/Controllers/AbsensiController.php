<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Exports\AbsensiExport;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use Maatwebsite\Excel\Facades\Excel;


class AbsensiController extends Controller
{
    //
    public function index(Request $request){

        $date = new DateTime('now');
        $tanggal    =   $date->format('Y-m-d');

        $judul      =   'Rekap Absensi WFH Pegawai Wakaf Salman ITB';
        $pegawai    =   Pegawai::all();
        if($request->pegawai != NULL){
            if($request->pegawai == "All"){
                $data = Absensi::all();
            }else{
                $data = Absensi::where('id_users','LIKE','%'.$request->pegawai.'%')->get();
            }
        }else{
            $data = Absensi::all();
        }
        return view('absensi/rekap', compact('tanggal','judul','data','pegawai'));

    }

    public function absen(){

        $date = new DateTime('now');
        $tanggal    =   $date->format('Y-m-d');

        $judul      =   'Absensi WFH';        
        $data       =   Absensi::where('id_users', auth()->user()->id_pegawais)->get();
        $jam_masuk  =   Absensi::select('jam_masuk')
                               ->where('id_users', auth()->user()->id_pegawais)
                               ->where('tanggal', $tanggal)
                               ->get(); 
        return view('absensi/absen', compact('tanggal','judul','data','jam_masuk'));

    }

    public function absen_masuk(Request $request){

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

    public function absen_keluar(Request $request){

        
        $timezone   =   'Asia/Jakarta';
        $date       =   new DateTime('now', new DateTimeZone($timezone));
        $tanggal    =   $date->format('Y-m-d');
        $localtime  =   $date->format('H:i:s');

        $data = Absensi::where([
            ['id_users','=',auth()->user()->id_pegawais],
            ['tanggal','=',$tanggal],
        ]);

        if($request->hasFile('hasil_kerja')){
            $request->file('hasil_kerja')->move('img/hasil-kerja-wfh/', $request->file('hasil_kerja')->getClientOriginalName());
            $absen_keluar=[
                'jam_keluar'    => $localtime,
                'hasil_kerja'   => $request->file('hasil_kerja')->getClientOriginalName() 
            ];
            $data->update($absen_keluar);
        }else{
            $absen_keluar=[
                'jam_keluar'    => $localtime
            ];
            $data->update($absen_keluar);            
        }
        return redirect()->route('absen')->with('success', 'Anda berhasil mengisi absen keluar WFH. Selamat beristirahat :) tetap jaga prokes dan kesehatan');
    }

    public function eksport_absensi(){

        return Excel::download(new AbsensiExport, 'Rekapitulasi Absensi WFH Wakaf Salman ITB.xlsx');

    }

}
