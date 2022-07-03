<?php

namespace App\Exports;

use App\Models\Pic;
use Maatwebsite\Excel\Concerns\FromCollection;

class PicExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pic::all();
    }
}
