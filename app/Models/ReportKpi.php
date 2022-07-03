<?php

namespace App\Models;

use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\KodeKpi;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportKpi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function divisis(){
        return $this->belongsTo(Divisi::class,'id_divisis','id');
    }

    public function jabatans(){
        return $this->belongsTo(Jabatan::class,'id_jabatans','id');
    }

    public function kode_kpis(){
        return $this->belongsTo(KodeKpi::class,'id_kode_kpis','id');
    }

    public function pegawais(){
        return $this->belongsTo(Pegawai::class,'id_pegawais','id');
    }

}
