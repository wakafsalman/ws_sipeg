<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ReportStock extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getTanggalIndoAttribute(){
        return Carbon::parse($this->attributes['tanggal_indo'])
                    ->translatedFormat('d F Y');
    }

}
