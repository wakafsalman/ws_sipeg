<?php

namespace App\Exports;

use App\Models\Satuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class SatuanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Satuan::all();
    }
}
