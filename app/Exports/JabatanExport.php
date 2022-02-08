<?php

namespace App\Exports;

use App\Models\Jabatan;
use Maatwebsite\Excel\Concerns\FromCollection;

class JabatanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jabatan::all();
    }
}
