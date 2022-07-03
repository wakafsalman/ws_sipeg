<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\KodeKpi;
use App\Models\ReportKpi;
use App\Models\Pegawai;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Session;

class KpiController extends Controller
{

    public function index(){

        $data       =   Kpi::all();
        $divisi     =   Divisi::all();
        $judul      =   'Key Performance Indicator (KPI)';
        $kode_kpi   =   KodeKpi::all();
        return view('kpi/data', compact('data','divisi','judul','kode_kpi'));

    }

    public function tambah_kpi(Request $request){

        $data = Kpi::create($request->all());
        return redirect()->route('kpi')->with('success', 'Data berhasil ditambah');

    }

    public function rubah_kpi(Request $request, $id){

        $data = Kpi::find($id);
        $data->update($request->all());
        return redirect()->route('kpi')->with('success', 'Data berhasil dirubah');

    }

    public function hapus_kpi($id){

        $data = Kpi::find($id);
        $data->delete();
        return redirect()->route('kpi')->with('success', 'Data berhasil dihapus');

    }

    public function report_kpi($id_divisi, $id_kode_kpi){

        $data           =   ReportKpi::where('id_divisis', $id_divisi)
                                ->where('id_kode_kpis', $id_kode_kpi)
                                ->get();
        $jabatan        =   Jabatan::all();
        $judul          =   'Report KPI';
        $judul_data     =   Kpi::where('id_divisis', $id_divisi)
                                ->where('id_kode_kpis', $id_kode_kpi)
                                ->get();
        $kode_kpi       =   KodeKpi::all();
        $pegawai        =   Pegawai::all();


        return view('kpi/report/management/data', compact('data','jabatan','judul','judul_data','kode_kpi','pegawai'));
        

    }

    public function tambah_report_kpi(Request $request){

        
        $jumlah_pic = count($request->id_pegawais);

        for($i=0;$i<$jumlah_pic;$i++){
            if($request->tanggal != NULL){
                ReportKpi::create([
                    'id_divisis'        =>  $request->id_divisis,
                    'id_kode_kpis'      =>  $request->id_kode_kpis,
                    'deskripsi'         =>  $request->deskripsi,
                    'id_pegawais'       =>  $request->id_pegawais[$i],
                    'progress'          =>  $request->progress,
                    'kendala'           =>  $request->kendala,
                    'tanggal'           =>  $request->tanggal,
                ]);    
            }else{
                ReportKpi::create([
                    'id_divisis'        =>  $request->id_divisis,
                    'id_kode_kpis'      =>  $request->id_kode_kpis,
                    'deskripsi'         =>  $request->deskripsi,
                    'id_pegawais'       =>  $request->id_pegawais[$i],
                    'progress'          =>  $request->progress,
                    'kendala'           =>  $request->kendala,
                    'keterangan'        =>  $request->keterangan,
                ]);    
            }
        }

        return redirect()->route('report_kpi', ['id_divisi' => $request->id_divisis, 'id_kode_kpi' => $request->id_kode_kpis])->with('success', 'Data berhasil ditambah');

    }

    public function rubah_report_kpi(Request $request, $id){

        $id_pegawai = Pegawai::select("id")
                            ->where("nama", "LIKE", "%{$request->pic}%")
                            ->get();

        $data = ReportKpi::find($id);
        $update_report=[
            'id_divisis'        =>  $request->id_divisis,
            'id_kode_kpis'      =>  $request->id_kode_kpis,
            'deskripsi'         =>  $request->deskripsi,
            'id_pegawais'       =>  $id_pegawai[0]->id,
            'progress'          =>  $request->progress,
            'keterangan'        =>  $request->keterangan,
            'kendala'           =>  $request->kendala,
        ];
        $data->update($update_report);
        return redirect()->route('report_kpi', ['id_divisi' => $request->id_divisis, 'id_kode_kpi' => $request->id_kode_kpis])->with('success', 'Data berhasil dirubah');

    }

    public function hapus_report_kpi($id){

        $data = ReportKpi::find($id);

        session(['id_divisi' => $data->id_divisis]);
        session(['id_kode_kpi' => $data->id_kode_kpis]);

        $id_divisi = session('id_divisi');
        $id_kode_kpi = session('id_kode_kpi');

        $data->delete();
        return redirect()->route('report_kpi', ['id_divisi' => $id_divisi, 'id_kode_kpi' => $id_kode_kpi])->with('success', 'Data berhasil dihapus');

    }

    public function kpi_report(){

        if(auth()->user()->id == 1){
            $judul      =   'KPI Report Wakaf Salman ITB';
            $data       =   ReportKpi::orderBy('id_kode_kpis','asc')
                                    ->get();
        }else{
            $judul      =   'KPI Report';
            $data       =   ReportKpi::where('id_pegawais', auth()->user()->id_pegawais)
                                    ->orderBy('id_kode_kpis','asc')
                                    ->get();
        }

        $jabatan        =   Jabatan::all();
        $kode_kpi       =   KodeKpi::all();
        $pegawai        =   Pegawai::all();


        return view('kpi/report/staff/data', compact('data','jabatan','judul','kode_kpi','pegawai'));
        

    }

    public function rubah_report_user_kpi(Request $request, $id){

        $data = ReportKpi::find($id);
        $data->update($request->all());
        return redirect()->route('kpi_report')->with('success', 'Data berhasil dirubah');

    }

 


}
