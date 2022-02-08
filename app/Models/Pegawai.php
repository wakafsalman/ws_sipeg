<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Divisi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jabatans(){
        return $this->belongsTo(Jabatan::class,'id_jabatans','id');
    }

    public function divisis(){
        return $this->belongsTo(Divisi::class,'id_divisis','id');
    }

}
