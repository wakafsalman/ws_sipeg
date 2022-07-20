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
            'jenis_aset' => $row[2],
            'nama' => $row[3],
            'tanggal' => $row[4],
            'jumlah' => $row[5],
            'satuan' => $row[6],
            'harga' => $row[7],
            'total' => $row[8],
            'pic' => $row[9]
        ]);

    }
}
