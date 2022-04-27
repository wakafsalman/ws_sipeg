<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Pegawai;
use App\Models\TrainingType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\TrainingExport;
use App\Exports\PointExport;
use Maatwebsite\Excel\Facades\Excel;


class TrainingController extends Controller
{
    //
    public function index(){

        $data               =   Training::where('id_users', auth()->user()->id_pegawais)
                                        ->select('*')                                
                                        ->get();
        $judul              =   'Record Training';
        $jenis_training     =   TrainingType::all();
        return view('training/input', compact('data','judul','jenis_training'));

    }

    public function input_training(Request $request){

        if($request->id_training_types == 5){
            $getJenisTraining = TrainingType::where('id', $request->id_training_types)
                                        ->select('poin')
                                        ->get();
            $jenis_training = $getJenisTraining[0]->poin;
            $jam = $request->durasi/60;
            if($request->insight != NULL){
                $getBonus = TrainingType::where('nama', 'Bonus Point')
                ->select('poin')
                ->get();
                $bonus = $getBonus[0]->poin;

                $poin = ($jenis_training * $jam) + $bonus;
            }else{
                $poin = $jenis_training * $jam;
            }
        }else{
            $getJenisTraining = TrainingType::where('id', $request->id_training_types)
                                        ->select('poin')
                                        ->get();
            $jenis_training = $getJenisTraining[0]->poin;
            if($request->insight != NULL){
                $getBonus = TrainingType::where('nama', 'Bonus Point')
                ->select('poin')
                ->get();
                $bonus = $getBonus[0]->poin;

                $poin = $jenis_training + $bonus;
            }else{
                $poin = $jenis_training;
            }
        }

        $data = Training::create([
            'id_users'                       =>  $request->id_users,
            'id_training_types'              =>  $request->id_training_types,
            'judul_training'                 =>  $request->judul_training,
            'durasi'                         =>  $request->durasi,
            'insight'                        =>  $request->insight,
            'poin'                           =>  $poin,
        ]);
        if($request->hasFile('hasil_training')){
            $gambar = "Hasil Training_".auth()->user()->pegawais->nama."_".$request->judul_training.".".$request->file('hasil_training')->getClientOriginalExtension();
            $request->file('hasil_training')->move('img/hasil-training/', $gambar);
            $data->hasil_training = $gambar;
            $data->save();
        }
        return redirect()->route('training')->with('success', 'Data berhasil ditambah');       

    }

    public function rubah_training(Request $request, $id){

        $data = Training::find($id);

        if($request->id_training_types == 5){
            $getJenisTraining = TrainingType::where('id', $request->id_training_types)
                                        ->select('poin')
                                        ->get();
            $jenis_training = $getJenisTraining[0]->poin;
            $jam = $request->durasi/60;
            if($request->insight != NULL){
                $getBonus = TrainingType::where('nama', 'Bonus Point')
                ->select('poin')
                ->get();
                $bonus = $getBonus[0]->poin;

                $poin = ($jenis_training * $jam) + $bonus;
            }else{
                $poin = $jenis_training * $jam;
            }
        }else{
            $getJenisTraining = TrainingType::where('id', $request->id_training_types)
                                        ->select('poin')
                                        ->get();
            $jenis_training = $getJenisTraining[0]->poin;
            if($request->insight != NULL){
                $getBonus = TrainingType::where('nama', 'Bonus Point')
                ->select('poin')
                ->get();
                $bonus = $getBonus[0]->poin;

                $poin = $jenis_training + $bonus;
            }else{
                $poin = $jenis_training;
            }
        }

        $data_update=[
            'id_users'                       =>  $request->id_users,
            'id_training_types'              =>  $request->id_training_types,
            'judul_training'                 =>  $request->judul_training,
            'durasi'                         =>  $request->durasi,
            'insight'                        =>  $request->insight,
            'poin'                           =>  $poin,
        ];


        $data->update($data_update);
        if($request->hasFile('hasil_training')){
            $gambar = "Hasil Training_".auth()->user()->pegawais->nama."_".$request->judul_training.".".$request->file('hasil_training')->getClientOriginalExtension();
            $request->file('hasil_training')->move('img/hasil-training/', $gambar);
            $data->hasil_training = $gambar;
            $data->save();
        }
        return redirect()->route('training')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_training($id){

        $data = Training::find($id);
        $data->delete();
        return redirect()->route('training')->with('success', 'Data berhasil dihapus');

    }

    public function rekap_training(Request $request){

        $judul              =   'Rekap Record Training Pegawai Wakaf Salman ITB';
        $pegawai            =   Pegawai::all();
        $jenis_training     =   TrainingType::all();
        if($request->pegawai != NULL){
            if($request->pegawai == "All"){
                $data = Training::all();
            }else{
                $data = Training::where('id_users', $request->pegawai)
                            ->select('*')
                            ->get();
            }
        }else{
            $data = Training::all();
        }
        return view('training/rekap_training', compact('data','jenis_training','judul','pegawai'));

    }    

    public function rekap_point(Request $request){

        $judul              =   'Rekap Record Training Point Pegawai Wakaf Salman ITB';
        $data               =   Pegawai::leftJoin('trainings','pegawais.id','=','trainings.id_users')
                                ->select('pegawais.id as id_karyawan','pegawais.nama as nama_karyawan')
                                ->selectRaw('SUM(trainings.poin) AS point')
                                ->groupBy('pegawais.nama')
                                ->orderBy('point','desc')
                                ->orderBy('pegawais.nama','asc')
                                ->get();
        return view('training/rekap_point', compact('data','judul'));

    }    

    public function reset_point($id){

        $data = Training::where('id_users', $id);
        $data->update([
            'poin' => 0
        ]);

        return redirect()->route('rekap_point');


    }

    /*
    public function eksport_cuti(){

        return Excel::download(new CutiExport, 'Rekapitulasi Cuti Karyawan Wakaf Salman ITB.xlsx');

    }
    */

}
