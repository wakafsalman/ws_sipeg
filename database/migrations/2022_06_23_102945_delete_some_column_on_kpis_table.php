<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteSomeColumnOnKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kpis', function (Blueprint $table) {
            $table->dropColumn('no_kpi')->nullable();
            $table->dropColumn('progress')->nullable();
            $table->dropColumn('kendala')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kpis', function (Blueprint $table) {
            $table->string('no_kpi')->nullable();
            $table->string('progress')->nullable();
            $table->string('kendala')->nullable();
        });
    }
}
