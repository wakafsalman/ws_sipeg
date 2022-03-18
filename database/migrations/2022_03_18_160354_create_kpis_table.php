<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jabatans')->nullable();
            $table->integer('id_kode_kpis')->nullable();
            $table->string('posisi')->nullable();
            $table->string('kode_kpi')->nullable();
            $table->string('kpi')->nullable();
            $table->string('target')->nullable();
            $table->string('progress')->nullable();
            $table->string('kendala')->nullable();
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
        Schema::dropIfExists('kpis');
    }
}
