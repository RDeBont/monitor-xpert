<?php

namespace Database\Seeders;

use App\Models\Melding;
use App\Models\Rapport;
use App\Models\User;
use Illuminate\Database\Seeder;

class RapportSeeder extends Seeder
{
    public function run(): void
    {
        $olga = User::where('email', 'olga.manager@ecopower.test')->first();
        $erik = User::where('email', 'erik.ceo@ecopower.test')->first();

        $rapport = Rapport::create([
            'user_id' => $olga->id,
            'titel' => 'Rapport september 2026',
            'periode_van' => '2026-09-01',
            'periode_tot' => '2026-09-30',
        ]);
        $rapport->gedeeldMet()->attach($erik->id);

        Melding::create(['user_id' => $erik->id, 'tekst' => 'Nieuw rapport gedeeld: Rapport september 2026.']);
    }
}