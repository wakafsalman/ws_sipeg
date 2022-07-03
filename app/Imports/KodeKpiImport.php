<?php

namespace App\Imports;

use App\Models\KodeKpi;
use Maatwebsite\Excel\Concerns\ToModel;

class KodeKpiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KodeKpi([
            'kode' => $row[1],
            'nama' => $row[2],
            'definisi' => $row[3],
            'target' => $row[4]
        ]);
    }
}
