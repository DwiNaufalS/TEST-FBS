<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'adminBP',
                'email' => 'adminBP@gmail.com',
                'password' => Hash::make('adminBP'), // Ganti dengan password yang sesuai
                'role' => 'adminBP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'adminGR',
                'email' => 'adminGR@gmail.com',
                'password' => Hash::make('adminGR'), // Ganti dengan password yang sesuai
                'role' => 'adminGR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('master_logins')->insert([
            [
                'username' => 'user1',
                'password' => Hash::make('user'),
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('master_logins')->insert([
            [
                'username' => 'admin1',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('master_login_admin')->insert([
            [
                'username' => 'adminGR',
                'password' => Hash::make('adminGR'), // Ganti dengan password yang sesuai
                'role' => 'GR',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Membuat akun untuk antrian jenis BP
        DB::table('master_login_admin')->insert([
            [
                'username' => 'adminBP',
                'password' => Hash::make('adminBP'), // Ganti dengan password yang sesuai
                'role' => 'BP',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
