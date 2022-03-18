<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\KodeKpi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jabatans(){
        return $this->belongsTo(Jabatan::class,'id_jabatans','id');
    }

    public function kode_kpis(){
        return $this->belongsTo(KodeKpi::class,'id_kode_kpis','id');
    }

}
