<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['technicus', 'operationeel_manager', 'klantenservice', 'executief_manager', 'klant'] as $naam) {
            Role::create(['naam' => $naam]);
        }
    }
}