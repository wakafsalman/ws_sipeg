<?php

namespace App\Exports;

use App\Models\Donatur;
use Maatwebsite\Excel\Concerns\FromCollection;

class DonaturExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Donatur::all();
    }

    public function map($donatur) : array {

        return [

            $donatur->id,
            $donatur->nama_lengkap,
            $donatur->nama_panggilan,
            $donatur->email,
            $donatur->jenis_kelamin,
            $donatur->tempat_lahir. ", " .$donatur->tgl_lahir,
            $absensi->alamat,
            $absensi->no_telepon,
            $absensi->no_hp,
            $absensi->asal_data,
            $absensi->event

        ] ;

    }

    public function headings() : array {

        return [

           '#',
           'Nama Lengkap',
           'Nama Panggilan',
           'Email',
           'Jenis Kelamin',
           'Tempat, Tanggal Lahir',
           'Alamat',
           'Telepon',
           'No. HP',
           'Asal Data',
           'Event'

        ] ;

    }

}
