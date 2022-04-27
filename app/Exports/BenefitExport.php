<?php

namespace App\Exports;

use App\Models\Benefit;
use Maatwebsite\Excel\Concerns\FromCollection;

class BenefitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Benefit::all();
    }
}
