<?php

namespace App\Exports;

use App\Models\Asset;
use App\Models\ReportAsset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportAssetExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ReportAsset::select('tanggal','id_assets','satuan','merk','harga','jumlah')
                          ->get();
    }

    public function map($report_asset) : array {

        return [

            $report_asset->tanggal,
            $report_asset->assets->nama,
            $report_asset->satuan,
            $report_asset->merk,
            $report_asset->harga,
            $report_asset->jumlah,
            $report_asset->harga*$report_asset->jumlah

        ] ;

    }

 

    public function headings() : array {

        return [

           'Tanggal Aset Masuk',
           'Nama Aset',
           'Satuan',
           'Merk',
           'Harga',
           'Jumlah',
           'Total'

        ] ;

    }
}
