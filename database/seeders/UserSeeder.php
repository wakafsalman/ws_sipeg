<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'nama' => 'IT Wakaf Salman',
            'email' => 'it.wakafsalman@gmail.com',
            'id_roles' => '1',
            'password' => bcrypt('ITw4k4f54lm4n'),
            'remember_token' => Str::random(60),
        ]);
    }
}
