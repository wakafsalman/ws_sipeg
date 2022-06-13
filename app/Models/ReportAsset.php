<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAsset extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function assets(){
        return $this->belongsTo(Asset::class,'id_assets','id');
    }

}
