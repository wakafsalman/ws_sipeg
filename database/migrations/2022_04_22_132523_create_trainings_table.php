<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users')->nullable();
            $table->integer('id_training_types')->nullable();
            $table->longText('judul_training')->nullable();
            $table->integer('durasi')->nullable();
            $table->string('hasil_training')->nullable();
            $table->string('insight')->nullable();
            $table->integer('poin')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
