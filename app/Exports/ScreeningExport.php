<?php

namespace App\Exports;

use App\Models\Screening;
use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class ScreeningExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Screening::all();
    }

    public function map($screening) : array {

        return [

            $screening->id,
            $screening->pegawais->nama,
            $screening->tanggal,
            $screening->demam,
            $screening->batuk_dahak,
            $screening->batuk_kering,
            $screening->lelah,
            $screening->sesak_nafas,
            $screening->nyeri_sendi,
            $screening->sakit_kepala,
            $screening->bersin,
            $screening->pilek,
            $screening->hidung_mampet,
            $screening->mata_berair,
            $screening->sakit_tenggorokan,
            $screening->diare,
            $screening->cium_aroma,
            $screening->rasa_lidah,
            $screening->lain_lain

        ] ;

    }

 

    public function headings() : array {

        return [

           '#',
           'Nama',
           'Tanggal',
           'Demam',
           'Batuk Berdahak',
           'Batuk Kering',
           'Lesu Lelah',
           'Sesak Nafas',
           'Nyeri/Ngilu Sendi',
           'Sakit Kepala',
           'Bersin-bersin',
           'Pilek',
           'Hidung Tersumbat',
           'Mata Berair',
           'Sakit Tenggorokan',
           'Diare',
           'Penciuman',
           'Rasa Lidah',
           'Keluhan Lainnya'

        ] ;

    }
}
