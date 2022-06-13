<?php

namespace App\Exports;

use App\Models\Absensi;
use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AbsensiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absensi::select('id','id_users','tanggal','jam_masuk','jam_keluar','rencana_kerja')
                        ->groupBy('id_users')
                        ->groupBy('tanggal')
                        ->groupBy('jam_masuk')
                        ->groupBy('jam_keluar')
                        ->selectRaw('GROUP_CONCAT(CONCAT(" https://employee.wakafsalman.or.id/img/hasil-kerja-wfh/", hasil_kerja)) as hasil_kerja')
                        ->get();
    }

    public function map($absensi) : array {

        return [

            $absensi->id,
            $absensi->pegawais->nama,
            $absensi->tanggal,
            $absensi->jam_masuk,
            $absensi->jam_keluar,
            $absensi->hasil_kerja

        ] ;

    }

 

    public function headings() : array {

        return [

           '#',
           'Nama',
           'Tanggal',
           'Jam Masuk',
           'Jam Keluar',
           'Hasil Kerja'

        ] ;

    }
}
