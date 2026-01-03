<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun admin jika belum ada
        User::firstOrCreate(
            [
                'email' => 'admin@example.com' // Kunci unik untuk mencari user
            ],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // Password default adalah 'password'
            ]
        );

        // (Opsional) Anda juga bisa membuat akun user biasa
        User::firstOrCreate(
            [
                'email' => 'user@example.com'
            ],
            [
                'name' => 'User Biasa',
                'password' => Hash::make('password'),
            ]
        );
    }
}
