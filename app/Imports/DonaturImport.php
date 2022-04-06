<?php

namespace App\Imports;

use App\Models\Donatur;
use Maatwebsite\Excel\Concerns\ToModel;

class DonaturImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            
            'nama_lengkap' => $row[1],
            'nama_panggilan' => $row[2],
            'email' => $row[3],
            'jenis_kelamin' => $row[4],
            'tempat_lahir' => $row[5],
            'tgl_lahir' => $row[6],
            'alamat' => $row[7],
            'no_telepon' => $row[8],
            'no_hp' => $row[9],
            'asal_data' => $row[10],
            'event' => $row[11]
        ]);

    }
}
