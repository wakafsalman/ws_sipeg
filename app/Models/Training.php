<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\TrainingType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Training extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawais(){
        return $this->belongsTo(Pegawai::class,'id_users','id');
    }

    public function training_types(){
        return $this->belongsTo(TrainingType::class,'id_training_types','id');
    }
    
}
