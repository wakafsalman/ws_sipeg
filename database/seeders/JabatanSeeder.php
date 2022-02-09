<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jabatans')->insert([
            'nama' => 'Junior Assistant Manager System Analyst',
        ]);

    }
}
