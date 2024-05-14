<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_level')->insert([
            ['level_kode' => 'AGT', 'level_nama' => 'Anggota'],
            ['level_kode' => 'BDHR', 'level_nama' => 'Bendahara PKK'],
            ['level_kode' => 'KTP', 'level_nama' => 'Ketua PKK'],
        ]);
    }
}
