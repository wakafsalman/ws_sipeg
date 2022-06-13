<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawais(){
        return $this->belongsTo(Pegawai::class,'id_users','id');
    }

    public function jabatans(){
        return $this->belongsTo(Jabatan::class,'id_jabatans','id');
    }

    public function assets(){
        return $this->belongsTo(Asset::class,'id_assets','id');
    }

}
