<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_stocks', function (Blueprint $table) {
            $table->integer('id_manager')->nullable();
            $table->text('notes')->nullable();
            $table->string('status_approval_manager')->nullable();
            $table->string('status_approval_hr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_stocks', function (Blueprint $table) {
            $table->dropColumn('id_manager')->nullable();
            $table->dropColumn('notes')->nullable();
            $table->dropColumn('status_approval_manager')->nullable();
            $table->dropColumn('status_approval_hr')->nullable();
        });
    }
}
