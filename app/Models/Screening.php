<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class,'id_users','id');
    }

    public function pegawais(){
        return $this->belongsTo(Pegawai::class,'id_users','id');
    }

}
