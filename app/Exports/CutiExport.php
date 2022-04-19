<?php

namespace App\Exports;

use App\Models\Cuti;
use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CutiExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cuti::select('*')
                    ->selectRaw('DATEDIFF(tanggal_akhir, tanggal_awal) as jumlah_cuti')
                    ->get();
    }

    public function map($cuti) : array {

        return [

            $cuti->id,
            $cuti->pegawais->nama,
            $cuti->pegawais->jabatans->nama,
            $cuti->pegawais->divisis->nama,
            $cuti->tanggal_awal,
            $cuti->tanggal_akhir,
            $cuti->jumlah_cuti + 1,
            $cuti->alamat,
            $cuti->no_telepon,
            $cuti->nama_delegasi,
            $cuti->detail_delegasi,
            $cuti->nama_delegasi_setuju,
            $cuti->atasan_setuju,
            $cuti->manager

        ] ;

    }

 

    public function headings() : array {

        return [

           '#',
           'Nama Lengkap',
           'Jabatan',
           'Divisi',
           'Tanggal Awal Cuti',
           'Tanggal Akhir Cuti',
           'Jumlah Hari Cuti',
           'Alamat yang bisa dihubungi',
           'No. Telepon yang bisa dihubungi',
           'Nama Lengkap yang didelegasikan tugas',
           'Detail Pekerjaan yang didelegasikan',
           'Sudah disetujui delegasi oleh nama terkait?',
           'Sudah disetujui atasan?',
           'Nama Lengkap Manager'

        ] ;

    }}
