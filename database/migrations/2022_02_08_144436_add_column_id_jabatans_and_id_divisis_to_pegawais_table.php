<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdJabatansAndIdDivisisToPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->integer('id_jabatans')->nullable();
            $table->integer('id_divisis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('id_jabatans')->nullable();
            $table->dropColumn('id_divisis')->nullable();
        });
    }
}
