<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Testaccounts uit het Testplan (hoofdstuk 3.1). Wachtwoord voor iedereen: Welkom123!
        $accounts = [
            ['Piet Jansen', 'piet.technicus@ecopower.test', '0612345001', 'technicus'],
            ['Sanne de Wit', 'sanne.technicus@ecopower.test', '0612345002', 'technicus'],
            ['Olga Bakker', 'olga.manager@ecopower.test', '0612345003', 'operationeel_manager'],
            ['Karin Visser', 'karin.service@ecopower.test', '0612345004', 'klantenservice'],
            ['Erik Mulder', 'erik.ceo@ecopower.test', '0612345005', 'executief_manager'],
            ['John Doe', 'john.doe@example.com', '123-456-7890', 'klant'],
            ['Jane Smith', 'jane.smith@example.com', '987-654-3210', 'klant'],
        ];

        foreach ($accounts as [$naam, $email, $telefoon, $rol]) {
            User::create([
                'role_id' => Role::where('naam', $rol)->value('id'),
                'name' => $naam,
                'email' => $email,
                'telefoonnummer' => $telefoon,
                'password' => 'Welkom123!',
                'actief' => true,
            ]);
        }
    }
}