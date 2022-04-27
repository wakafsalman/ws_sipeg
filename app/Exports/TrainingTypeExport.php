<?php

namespace App\Exports;

use App\Models\TrainingType;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrainingTypeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TrainingType::all();
    }
}
