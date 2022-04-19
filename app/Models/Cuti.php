<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cuti extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawais(){
        return $this->belongsTo(Pegawai::class,'id_users','id');
    }

    public function jabatans(){
        return $this->belongsTo(Jabatan::class,'id_jabatans','id');
    }

    public function divisis(){
        return $this->belongsTo(Divisi::class,'id_divisis','id');
    }

    public function getTanggalAwalIndoAttribute(){
        return Carbon::parse($this->attributes['tanggal_awal_indo'])
                    ->translatedFormat('d F Y');
    }
    
    public function getTanggalAkhirIndoAttribute(){
        return Carbon::parse($this->attributes['tanggal_akhir_indo'])
                    ->translatedFormat('d F Y');
    }
    
}
