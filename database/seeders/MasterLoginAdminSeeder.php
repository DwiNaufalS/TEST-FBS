<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Hash;

class MasterLoginAdminSeeder extends Seeder
{
    public function run()
    {
        // Membuat akun untuk antrian jenis GR
        DB::table('master_login_admin')->insert([
            'username' => 'adminGR',
            'password' => Hash::make('adminGR'), // Ganti dengan password yang sesuai
            'role' => 'GR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Membuat akun untuk antrian jenis BP
        DB::table('master_login_admin')->insert([
            'username' => 'adminBP',
            'password' => Hash::make('adminBP'), // Ganti dengan password yang sesuai
            'role' => 'BP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
