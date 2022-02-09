<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisis')->insert([
            'nama' => 'Operation',
        ]);
        //
    }
}
