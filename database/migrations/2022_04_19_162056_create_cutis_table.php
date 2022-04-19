<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users')->nullable();
            $table->integer('id_jabatans')->nullable();
            $table->integer('id_divisis')->nullable();
            $table->string('jenis_cuti')->nullable();
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->date('tanggal_awal_indo')->nullable();
            $table->date('tanggal_akhir_indo')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('no_telepon')->nullable();
            $table->string('nama_delegasi')->nullable();
            $table->text('detail_delegasi')->nullable();
            $table->string('nama_delegasi_setuju')->nullable();
            $table->string('atasan_setuju')->nullable();
            $table->string('manager')->nullable();
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
        Schema::dropIfExists('cutis');
    }
}
