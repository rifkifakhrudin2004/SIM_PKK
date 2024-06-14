<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddLoginAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_users')->insert([
            [
                'username' => 'admin',
                'nama' => 'adminPKK',
                'password' => Hash::make('12345678'), // Menggunakan Hash::make untuk bcrypt
                'level_id' => '4',
                'status' => 'aktif',
            ],
        ]);
    }
}