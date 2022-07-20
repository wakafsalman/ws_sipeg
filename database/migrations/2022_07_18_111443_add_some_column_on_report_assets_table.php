<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnOnReportAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_assets', function (Blueprint $table) {
            $table->string('jenis_aset')->nullable();
            $table->dropColumn('id_assets')->nullable();
            $table->string('aset')->nullable();
            $table->date('tanggal_beli')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_assets', function (Blueprint $table) {
            $table->dropColumn('jenis_aset')->nullable();
            $table->string('id_assets')->nullable();
            $table->dropColumn('aset')->nullable();
            $table->dropColumn('tanggal_beli')->nullable();
        });
    }
}
