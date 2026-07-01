<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ukt.com'],
            [
                'name' => 'Admin TU',
                'password' => Hash::make('password123'),
                'role_id' => 2,
            ]
        );

        User::updateOrCreate(
            ['email' => 'kaprodi@ukt.com'],
            [
                'name' => 'Kaprodi',
                'password' => Hash::make('password123'),
                'role_id' => 3,
            ]
        );

        User::updateOrCreate(
            ['email' => 'dekan@ukt.com'],
            [
                'name' => 'Dekan',
                'password' => Hash::make('password123'),
                'role_id' => 4,
            ]
        );
    }
}