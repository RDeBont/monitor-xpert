<?php

namespace Database\Seeders;

use App\Models\Centrale;
use App\Models\Onderhoudstaak;
use App\Models\User;
use Illuminate\Database\Seeder;

class OnderhoudSeeder extends Seeder
{
    public function run(): void
    {
        // Voorbeeld-JSON onderhoudstaken uit de bijlagen van de opdracht
        Onderhoudstaak::create([
            'centrale_id' => Centrale::where('naam', 'Centrale 1')->value('id'),
            'technicus_id' => User::where('email', 'piet.technicus@ecopower.test')->value('id'),
            'type_taak' => 'Monthly inspection',
            'omschrijving' => 'Perform routine inspection of solar panels and cleaning.',
            'gepland_op' => '2026-10-15 09:00:00',
            'verwachte_duur_uren' => 4,
            'status' => 'gepland',
        ]);

        Onderhoudstaak::create([
            'centrale_id' => Centrale::where('naam', 'Centrale 2')->value('id'),
            'technicus_id' => User::where('email', 'sanne.technicus@ecopower.test')->value('id'),
            'type_taak' => 'Emergency repair',
            'omschrijving' => 'Repair faulty wind turbine ASAP.',
            'gepland_op' => '2026-10-09 08:00:00',
            'verwachte_duur_uren' => 6,
            'status' => 'gepland',
        ]);
    }
}