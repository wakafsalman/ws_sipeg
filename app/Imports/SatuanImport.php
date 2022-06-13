<?php

namespace App\Imports;

use App\Models\Satuan;
use Maatwebsite\Excel\Concerns\ToModel;

class SatuanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Satuan([
            'nama' => $row[1]
        ]);
    }
}
