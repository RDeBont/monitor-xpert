<?php

namespace Database\Seeders;

use App\Models\Centrale;
use App\Models\Klant;
use App\Models\User;
use Illuminate\Database\Seeder;

class KlantSeeder extends Seeder
{
    public function run(): void
    {
        // Voorbeeld-JSON klantinformatie uit de bijlagen van de opdracht
        $klanten = [
            ['12345', 'John Doe', 'john.doe@example.com', '123-456-7890', 'Centrale 1', 'C-12345', '2026-01-01', '2027-12-31', 24],
            ['67890', 'Jane Smith', 'jane.smith@example.com', '987-654-3210', 'Centrale 2', 'C-67890', '2025-11-01', '2026-11-01', 48],
        ];

        foreach ($klanten as [$nummer, $naam, $email, $telefoon, $centrale, $contract, $start, $eind, $hersteltijd]) {
            $klant = Klant::create([
                'user_id' => User::where('email', $email)->value('id'),
                'klantnummer' => $nummer,
                'naam' => $naam,
                'email' => $email,
                'telefoonnummer' => $telefoon,
            ]);

            $klant->contracten()->create([
                'centrale_id' => Centrale::where('naam', $centrale)->value('id'),
                'contractnummer' => $contract,
                'type' => 'Standaard',
                'startdatum' => $start,
                'einddatum' => $eind,
                'hersteltijd_uren' => $hersteltijd,
            ]);
        }
    }
}