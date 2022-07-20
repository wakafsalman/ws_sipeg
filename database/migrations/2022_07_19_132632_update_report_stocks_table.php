<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReportStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_stocks', function (Blueprint $table) {
            $table->dropColumn('id_assets')->nullable();
            $table->dropColumn('jumlah')->nullable();
            $table->dropColumn('satuan')->nullable();
            $table->dropColumn('jumlah_in')->nullable();
            $table->dropColumn('jumlah_out')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('status')->nullable();
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->integer('id_assets')->nullable();
        $table->integer('jumlah')->nullable();
        $table->string('satuan')->nullable();
        $table->integer('jumlah_in')->nullable();
        $table->integer('jumlah_out')->nullable();
        $table->dropColumn('keterangan')->nullable();
        $table->dropColumn('tanggal')->nullable();
        $table->dropColumn('status')->nullable();
        $table->dropColumn('file')->nullable();
}
}
