<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->insert([
            'nama' => 'Ryan Pradhana',
            'jenis_kelamin' => 'Laki-Laki',
            'no_telepon' => '081239115524',
            'tempat_lahir' => 'Bandung',
            'tgl_lahir' => '1993-02-24',
            'alamat' => 'Jl. Madurasa Utara No. 14 RT 003 RW 007 Kel.Cigereleng Kec.Regol Kota Bandung 40253',
            'jabatan' => 'Junior Assistant Manager System Analyst',
            'divisi' => 'Operation',
        ]);
    }
}
