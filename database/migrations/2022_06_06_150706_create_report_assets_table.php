<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_assets', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('id_assets')->nullable();
            $table->string('satuan')->nullable();
            $table->string('merk')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('jumlah')->nullable();
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
        Schema::dropIfExists('report_assets');
    }
}
