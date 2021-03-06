<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nama' => $row[1],
            'email' => $row[2],
            'password' => $row[4],
            'id_roles' => $row[7],
            'id_pegawais' => $row[8],
            'foto' => $row[9]
        ]);
    }
}
