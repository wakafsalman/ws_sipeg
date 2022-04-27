<?php

namespace App\Http\Controllers;

use App\Models\TrainingType;
use App\Exports\TrainingTypeExport;
use App\Imports\TrainingTypeImport;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class TrainingTypeController extends Controller
{

    public function index(){

        $bonus  =   TrainingType::where('nama','Bonus Point')->get();
        $data   =   TrainingType::all();
        $judul  =   'Data Jenis Training';
        return view('jenis_training/data', compact('bonus','data','judul'));

    }

    public function tambah_jenis_training(Request $request){

        $data = TrainingType::create($request->all());
        return redirect()->route('jenis_training')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_jenis_training(Request $request, $id){

        $data = TrainingType::find($id);
        $data->update($request->all());
        return redirect()->route('jenis_training')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_jenis_training($id){

        $data = TrainingType::find($id);
        $data->delete();
        return redirect()->route('jenis_training')->with('success', 'Data berhasil dihapus');

    }

    public function eksport_jenis_training(){

        return Excel::download(new TrainingTypeExport, 'Data Jenis Training Wakaf Salman ITB.xlsx');

    }

    public function import_jenis_training(Request $request) {

        $data = $request->file('file');

        $nama_file = $data->getClientOriginalName();
        $data->move('DataJenisTraining', $nama_file);

        Excel::import(new TrainingTypeImport, \public_path('/DataJenisTraining/'.$nama_file));
        return \redirect()->back();

    }

    public function rubah_bonus_point(Request $request, $id){

        $data = TrainingType::find($id);
        $bonus_point=[
            'poin'        =>  $request->poin,
        ];
        $data->update($bonus_point);        
        return redirect()->route('jenis_training')->with('success', 'Data berhasil dirubah');

    }

}
