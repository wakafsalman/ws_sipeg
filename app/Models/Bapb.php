<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bapb extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawais(){
        return $this->belongsTo(Pegawai::class,'id_pegawais','id');
    }

}
