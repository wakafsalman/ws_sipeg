<?php

namespace App\Imports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ToModel;

class AssetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asset([
            
            'kode' => $row[1],
            'nama' => $row[2],
            'merk' => $row[3],
            'pic' => $row[4],
            'jumlah' => $row[5],
            'satuan' => $row[6]
        ]);

    }
}
