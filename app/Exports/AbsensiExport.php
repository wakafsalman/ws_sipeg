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
        return Absensi::all();
    }

    public function map($absensi) : array {

        return [

            $absensi->id,
            $absensi->pegawais->nama,
            $absensi->tanggal,
            $absensi->jam_masuk,
            $absensi->jam_keluar,
            "https://employee.wakafsalman.or.id/img/hasil-kerja-wfh/".$absensi->hasil_kerja

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

    }}
