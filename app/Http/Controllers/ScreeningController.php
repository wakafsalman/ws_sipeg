<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Screening;
use DateTime;
use Illuminate\Http\Request;
use App\Exports\ScreeningExport;
use Maatwebsite\Excel\Facades\Excel;


class ScreeningController extends Controller
{
    //
    public function index(Request $request){

        $date = new DateTime('now');
        $tanggal    =   $date->format('Y-m-d');

        $judul      =   'Rekap Screening Pegawai Wakaf Salman ITB';
        $pegawai    =   Pegawai::all();
        if($request->pegawai != NULL){
            if($request->pegawai == "All"){
                $data = Screening::all();
            }else{
                $data = Absensi::where('id_users','=',$request->pegawai)->get();
            }
        }else{
            $data = Screening::all();
        }
        return view('absensi/screening_rekap', compact('tanggal','judul','data','pegawai'));

    }

    public function eksport_screening(){

        return Excel::download(new ScreeningExport, 'Rekapitulasi Screening Wakaf Salman ITB.xlsx');

    }

}
