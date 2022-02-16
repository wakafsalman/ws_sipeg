<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            
            'nama' => $row[1],
            'jenis_kelamin' => $row[2],
            'no_telepon' => $row[3],
            'tempat_lahir' => $row[4],
            'tgl_lahir' => $row[5],
            'alamat' => $row[6],
            'foto' => $row[7],
            'id_jabatans' => $row[10],
            'id_divisis' => $row[11]
        ]);

    }
}
