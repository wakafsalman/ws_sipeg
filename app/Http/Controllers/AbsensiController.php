<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Pegawai;
use App\Models\Screening;
use App\Exports\AbsensiExport;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use Validator;
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
                $data = Absensi::select('id','id_users','tanggal','jam_masuk','jam_keluar','rencana_kerja')
                                ->groupBy('id_users')
                                ->groupBy('tanggal')
                                ->groupBy('jam_masuk')
                                ->groupBy('jam_keluar')
                                ->selectRaw('GROUP_CONCAT(hasil_kerja) as hasil_kerja')
                                ->get();
            }else{
                $data = Absensi::where('id_users', $request->pegawai)
                                ->groupBy('id_users')
                                ->groupBy('tanggal')
                                ->groupBy('jam_masuk')
                                ->groupBy('jam_keluar')
                                ->select('id','id_users','tanggal','jam_masuk','jam_keluar','rencana_kerja')
                                ->selectRaw('GROUP_CONCAT(hasil_kerja) as hasil_kerja')
                                ->get();
            }
        }else{
            $data = Absensi::select('id','id_users','tanggal','jam_masuk','jam_keluar','rencana_kerja')
                            ->groupBy('id_users')
                            ->groupBy('tanggal')
                            ->groupBy('jam_masuk')
                            ->groupBy('jam_keluar')
                            ->selectRaw('GROUP_CONCAT(hasil_kerja) as hasil_kerja')
                            ->get();
        }
        return view('absensi/rekap', compact('tanggal','judul','data','pegawai'));

    }

    public function absen(){

        $judul      =   'Absensi WFH';        
        $data       =   Absensi::where('id_users', auth()->user()->id_pegawais)
                                ->groupBy('id_users')
                                ->groupBy('tanggal')
                                ->groupBy('jam_masuk')
                                ->groupBy('jam_keluar')
                                ->select('id','id_users','tanggal','jam_masuk','jam_keluar','rencana_kerja')
                                ->selectRaw('GROUP_CONCAT(hasil_kerja) as hasil_kerja')
                                ->get();
        return view('absensi/absen', compact('judul','data'));

    }

    public function presensi(Request $request){

            if($request->hasFile('hasil_kerja')){

                $files = $request->file('hasil_kerja');
                foreach ($files as $file){
                    $gambar = "Hasil Kerja_".auth()->user()->pegawais->nama."_".$request->tanggal."_".$file->getClientOriginalName();
                    $file->move('img/hasil-kerja-wfh/', $gambar);
                    Absensi::create([
                        'id_users'          =>  auth()->user()->id_pegawais,
                        'tanggal'           =>  $request->tanggal,
                        'jam_masuk'         =>  $request->jam_masuk,
                        'rencana_kerja'     =>  '',
                        'jam_keluar'        =>  $request->jam_keluar,
                        'hasil_kerja'       =>  $gambar,
                    ]);    
                }
    
            }
    
            Screening::create([
                'id_users'              =>  auth()->user()->id_pegawais,
                'id_pegawais'           =>  auth()->user()->id_pegawais,
                'tanggal'               =>  $request->tanggal,
                'demam'                 =>  $request->demam,
                'batuk_dahak'           =>  $request->batuk_dahak,
                'batuk_kering'          =>  $request->batuk_kering,
                'lelah'                 =>  $request->lelah,
                'sesak_nafas'           =>  $request->sesak_nafas,
                'nyeri_sendi'           =>  $request->nyeri_sendi,
                'sakit_kepala'          =>  $request->sakit_kepala,
                'bersin'                =>  $request->bersin,
                'pilek'                 =>  $request->pilek,
                'hidung_mampet'         =>  $request->hidung_mampet,
                'mata_berair'           =>  $request->mata_berair,
                'sakit_tenggorokan'     =>  $request->sakit_tenggorokan,
                'diare'                 =>  $request->diare,
                'cium_aroma'            =>  $request->cium_aroma,
                'rasa_lidah'            =>  $request->rasa_lidah,
                'lain_lain'             =>  $request->lain_lain,
            ]);
    
            return redirect()->route('absen')->with('success', 'Jazakumulloh khoir sudah presensi hari ini, sehat-sehat yaa.. selamat beristirahat :)');
    
    }

    public function eksport_absensi(){

        return Excel::download(new AbsensiExport, 'Rekapitulasi Absensi WFH Wakaf Salman ITB.xlsx');

    }

}
