<?php

namespace App\Imports;

use App\Models\Pic;
use Maatwebsite\Excel\Concerns\ToModel;

class PicImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pic([
            'nama' => $row[1]
        ]);
    }
}
