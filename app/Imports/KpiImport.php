<?php

namespace App\Imports;

use App\Models\Kpi;
use Maatwebsite\Excel\Concerns\ToModel;

class KpiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kpi([
            /*
            TO BE DESTRUCTION
            'kode' => $row[1],
            'nama' => $row[2]
            */
        ]);
    }
}
