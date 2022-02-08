<?php

namespace App\Imports;

use App\Models\Jabatan;
use Maatwebsite\Excel\Concerns\ToModel;

class JabatanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jabatan([
            'nama' => $row[1]
        ]);
    }
}
