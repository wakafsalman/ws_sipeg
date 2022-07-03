<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\CutiExport;
use PDF;
use DateTime;
use Maatwebsite\Excel\Facades\Excel;


class CutiController extends Controller
{
    //
    public function index(){

        $data       =   Cuti::where('id_users', auth()->user()->id_pegawais)
                            ->select('*')
                            ->selectRaw('DATEDIFF(tanggal_akhir, tanggal_awal) as jumlah_cuti')
                            ->get();
        $judul      =   'Pengajuan Cuti';
        $manager    =   Pegawai::whereIn('id', [2, 39, 3, 12, 22, 6, 7])
                                ->orderBy('nama','asc')
                                ->get();
        return view('izin/cuti', compact('data','judul','manager'));

    }

    public function input_cuti(Request $request){

        $data = Cuti::create([
            'id_users'              =>  $request->id_users,
            'id_jabatans'           =>  $request->id_jabatans,
            'id_divisis'            =>  $request->id_divisis,
            'jenis_cuti'            =>  $request->jenis_cuti,
            'tanggal_awal'          =>  $request->tanggal_awal,
            'tanggal_awal_indo'     =>  $request->tanggal_awal,
            'tanggal_akhir'         =>  $request->tanggal_akhir,
            'tanggal_akhir_indo'    =>  $request->tanggal_akhir,
            'alamat'                =>  $request->alamat,
            'no_telepon'            =>  $request->no_telepon,
            'nama_delegasi'         =>  $request->nama_delegasi,
            'detail_delegasi'       =>  $request->detail_delegasi,
            'nama_delegasi_setuju'  =>  $request->nama_delegasi_setuju,
            'atasan_setuju'         =>  $request->atasan_setuju,
            'manager'               =>  $request->manager,
        ]);
        return redirect()->route('cuti')->with('success', 'Data berhasil ditambah');

    }

    public function rekap_cuti(Request $request){

        $judul      =   'Rekap Cuti Pegawai Wakaf Salman ITB';
        $pegawai    =   Pegawai::all();
        if($request->pegawai != NULL){
            if($request->pegawai == "All"){
                $data = Cuti::select('*')
                            ->selectRaw('DATEDIFF(tanggal_akhir, tanggal_awal) as jumlah_cuti')
                            ->get();
            }else{
                $data = Cuti::where('id_users', $request->pegawai)
                            ->select('*')
                            ->selectRaw('DATEDIFF(tanggal_akhir, tanggal_awal) as jumlah_cuti')
                            ->get();
            }
        }else{
            $data = Cuti::select('*')
                        ->selectRaw('DATEDIFF(tanggal_akhir, tanggal_awal) as jumlah_cuti')
                        ->get();
        }
        return view('izin/rekap_cuti', compact('data','judul','pegawai'));

    }    

    public function eksport_cuti(){

        return Excel::download(new CutiExport, 'Rekapitulasi Cuti Karyawan Wakaf Salman ITB.xlsx');

    }

    public function buka_form_cuti($id){

        $data = Cuti::find($id);

        $temp_tanggal_awal = $data->tanggal_awal;
        $temp_tanggal_akhir = $data->tanggal_akhir;
        $tanggal_awal = new DateTime($temp_tanggal_awal);
        $tanggal_akhir = new DateTime($temp_tanggal_akhir);
        $temp_jumlah_cuti = $tanggal_awal->diff($tanggal_akhir);
        $jumlah_cuti = $temp_jumlah_cuti->format('%a');

        $pdf = PDF::loadview('izin/form_cuti', compact('data','jumlah_cuti'))->setPaper('a4', 'portrait');
        return $pdf->stream();

    }

    public function simpan_form_cuti($id){

        $data = Cuti::find($id);        

        $temp_tanggal_awal = $data->tanggal_awal;
        $temp_tanggal_akhir = $data->tanggal_akhir;
        $tanggal_awal = new DateTime($temp_tanggal_awal);
        $tanggal_akhir = new DateTime($temp_tanggal_akhir);
        $temp_jumlah_cuti = $tanggal_awal->diff($tanggal_akhir);
        $jumlah_cuti = $temp_jumlah_cuti->format('%a');

        $pegawai = Pegawai::where('id', $data->id_users)
                            ->get();

        $nama_karyawan = strtoupper($pegawai[0]->nama);

        $pdf = PDF::loadview('izin/form_cuti', compact('data','jumlah_cuti'))->setPaper('a4', 'portrait');
        return $pdf->download('FORM PENGAJUAN CUTI - '.$nama_karyawan.'.pdf');

    }

}
