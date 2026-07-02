<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => 'Mahasiswa'
        ]);

        Role::firstOrCreate([
            'name' => 'Admin TU'
        ]);

        Role::firstOrCreate([
            'name' => 'Kaprodi'
        ]);

        Role::firstOrCreate([
            'name' => 'Dekan'
        ]);
    }
}