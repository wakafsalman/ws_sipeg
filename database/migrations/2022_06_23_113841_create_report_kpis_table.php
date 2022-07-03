<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_kpis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_divisis')->nullable();
            $table->integer('id_kode_kpis')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('id_pegawais')->nullable();
            $table->integer('progress')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('keterangan')->nullable();
            $table->longText('kendala')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_kpis');
    }
}
