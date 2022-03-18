<?php

namespace App\Exports;

use App\Models\KodeKpi;
use Maatwebsite\Excel\Concerns\FromCollection;

class KodeKpiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KodeKpi::all();
    }
}
