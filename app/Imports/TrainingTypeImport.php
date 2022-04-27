<?php

namespace App\Imports;

use App\Models\TrainingType;
use Maatwebsite\Excel\Concerns\ToModel;

class TrainingTypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TrainingType([
            'nama' => $row[1],
            'poin' => $row[2]
        ]);
    }
}
