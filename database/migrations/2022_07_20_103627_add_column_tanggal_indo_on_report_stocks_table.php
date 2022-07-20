<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTanggalIndoOnReportStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_stocks', function (Blueprint $table) {
            $table->date('tanggal_indo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_stocks', function (Blueprint $table) {
            $table->dropColumn('tanggal_indo')->nullable();
        });
    }
}
