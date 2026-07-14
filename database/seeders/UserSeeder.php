<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin TU
        User::updateOrCreate(
            ['email' => 'admin@ukt.com'],
            [
                'name' => 'Admin TU',
                'nip' => '1987654321',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ]
        );

        // Kaprodi
        User::updateOrCreate(
            ['email' => 'kaprodi@ukt.com'],
            [
                'name' => 'Kaprodi',
                'nip' => '1987654322',
                'password' => Hash::make('password123'),
                'role_id' => 3,
            ]
        );

        // Dekan
        User::updateOrCreate(
            ['email' => 'dekan@ukt.com'],
            [
                'name' => 'Dekan',
                'nip' => '1987654323',
                'password' => Hash::make('password123'),
                'role_id' => 4,
            ]
        );
    }
}