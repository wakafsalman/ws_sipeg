<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users')->nullable();
            $table->integer('id_pegawais')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('demam')->nullable();
            $table->string('batuk_dahak')->nullable();
            $table->string('batuk_kering')->nullable();
            $table->string('lelah')->nullable();
            $table->string('sesak_nafas')->nullable();
            $table->string('nyeri_sendi')->nullable();
            $table->string('sakit_kepala')->nullable();
            $table->string('bersin')->nullable();
            $table->string('pilek')->nullable();
            $table->string('hidung_mampet')->nullable();
            $table->string('mata_berair')->nullable();
            $table->string('sakit_tenggorokan')->nullable();
            $table->string('diare')->nullable();
            $table->string('cium_aroma')->nullable();
            $table->string('rasa_lidah')->nullable();
            $table->string('lain_lain')->nullable();
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
        Schema::dropIfExists('screenings');
    }
}
