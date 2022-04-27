<?php

namespace App\Imports;

use App\Models\Benefit;
use Maatwebsite\Excel\Concerns\ToModel;

class BenefitImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Benefit([
            'nama' => $row[1],
            'poin' => $row[2]
        ]);
    }
}
