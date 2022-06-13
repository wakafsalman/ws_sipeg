<?php

namespace App\Exports;

use App\Models\Asset;
use App\Models\ReportStock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportStockExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ReportStock::select('id_assets','jumlah','satuan','jumlah_in','jumlah_out')
                          ->get();
    }

    public function map($report_stock) : array {

        return [

            $report_stock->assets->nama. "(".$report_stock->assets->merk.")",
            $report_stock->jumlah,
            $report_stock->satuan,
            $report_stock->jumlah_in,
            $report_stock->jumlah_out,
            ($report_stock->jumlah+$report_asset->jumlah_in)-$report_asset->jumlah_out

        ] ;

    }

 

    public function headings() : array {

        return [

           'Nama Aset',
           'Stock Awal',
           'Satuan',
           'Mutasi In',
           'Mutasi Out',
           'Stock Akhir'

        ] ;

    }
}
