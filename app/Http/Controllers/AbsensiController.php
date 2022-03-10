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
        $jam_masuk  =   Absensi::where('id_users', auth()->user()->id_pegawais)
                                ->where('tanggal', $tanggal)
                                ->get();                                         
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
        return view('absensi/rekap', compact('tanggal','judul','data','pegawai','jam_masuk'));

    }

    public function absen(){

        $date = new DateTime('now');

        $tanggal    =   $date->format('Y-m-d');
        $judul      =   'Absensi WFH';        
        $data       =   Absensi::where('id_users', auth()->user()->id_pegawais)
                                ->groupBy('id_users')
                                ->groupBy('tanggal')
                                ->groupBy('jam_masuk')
                                ->groupBy('jam_keluar')
                                ->select('id','id_users','tanggal','jam_masuk','jam_keluar','rencana_kerja')
                                ->selectRaw('GROUP_CONCAT(hasil_kerja) as hasil_kerja')
                                ->get();
        $jam_masuk  =   Absensi::where('id_users', auth()->user()->id_pegawais)
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

    public function absen_keluar(Request $request, $id){

        
        $timezone   =   'Asia/Jakarta';
        $date       =   new DateTime('now', new DateTimeZone($timezone));
        $tanggal    =   $date->format('Y-m-d');
        $localtime  =   $date->format('H:i:s');

        if($request->hasFile('hasil_kerja')){

            $files = $request->file('hasil_kerja');
            $first = true;
            foreach ($files as $file){
                $gambar = "Hasil Kerja_".auth()->user()->pegawais->nama."_".$request->tanggal."_".$file->getClientOriginalName();
                $file->move('img/hasil-kerja-wfh/', $gambar);
                if($first){
                    $data = Absensi::find($id);
                    $absen_keluar=[
                        'jam_keluar'        =>  $localtime,
                        'hasil_kerja'       =>  $gambar,
                    ];
                    $data->update($absen_keluar);
                    $first = false;
                }else{
                    Absensi::create([
                        'id_users'          =>  auth()->user()->id_pegawais,
                        'tanggal'           =>  $request->tanggal,
                        'jam_masuk'         =>  $request->jam_masuk,
                        'rencana_kerja'     =>  $request->rencana_kerja,
                        'jam_keluar'        =>  $localtime,
                        'hasil_kerja'       =>  $gambar,
                    ]);
                }
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
        return redirect()->route('absen')->with('success', 'Anda berhasil mengisi absen keluar WFH. Selamat beristirahat :) tetap jaga prokes dan kesehatan');
    }

    public function rubah_rencana_kerja(Request $request, $id){

        $data = Absensi::find($id);
        $data->update($request->all());
        return redirect()->route('absen')->with('success', 'Data berhasil dirubah');

    }

    public function eksport_absensi(){

        return Excel::download(new AbsensiExport, 'Rekapitulasi Absensi WFH Wakaf Salman ITB.xlsx');

    }

}
