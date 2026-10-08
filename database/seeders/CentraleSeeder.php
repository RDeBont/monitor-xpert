<?php

namespace Database\Seeders;

use App\Models\Centrale;
use App\Models\Locatie;
use Illuminate\Database\Seeder;

class CentraleSeeder extends Seeder
{
    public function run(): void
    {
        // Voorbeeld-JSON energieproductie uit de bijlagen van de opdracht
        $data = [
            [
                'locatie' => ['naam' => 'Central Location 1', 'regio' => 'Zuid'],
                'centrale' => ['naam' => 'Centrale 1', 'adres' => 'Energieweg 1, Bergen op Zoom'],
                'meting' => ['zon_kwh' => 1500, 'wind_kwh' => 800, 'biomassa_kwh' => 1200, 'temperatuur' => 25.5, 'efficientie' => 92.4],
                'document' => ['naam' => 'Handleiding omvormer', 'soort' => 'handleiding', 'bestandspad' => 'documenten/handleiding-omvormer.pdf'],
            ],
            [
                'locatie' => ['naam' => 'Central Location 2', 'regio' => 'West'],
                'centrale' => ['naam' => 'Centrale 2', 'adres' => 'Windpark 2, Roosendaal'],
                'meting' => ['zon_kwh' => 1200, 'wind_kwh' => 600, 'biomassa_kwh' => 1000, 'temperatuur' => 23.8, 'efficientie' => 91.1],
                'document' => ['naam' => 'Schema turbine', 'soort' => 'schema', 'bestandspad' => 'documenten/schema-turbine.pdf'],
            ],
        ];

        foreach ($data as $rij) {
            $locatie = Locatie::create($rij['locatie']);
            $centrale = Centrale::create($rij['centrale'] + ['locatie_id' => $locatie->id, 'status' => 'actief']);

            $centrale->grenswaarde()->create([
                'min_temperatuur' => 10,
                'max_temperatuur' => 40,
                'min_efficientie' => 85,
            ]);

            // Metingen van de afgelopen 30 dagen (dagelijks om 12:00), met kleine variatie
            for ($dag = 30; $dag >= 1; $dag--) {
                $factor = 1 + sin($dag) * 0.05;
                $centrale->metingen()->create([
                    'gemeten_op' => now()->subDays($dag)->setTime(12, 0),
                    'zon_kwh' => round($rij['meting']['zon_kwh'] * $factor, 1),
                    'wind_kwh' => round($rij['meting']['wind_kwh'] * $factor, 1),
                    'biomassa_kwh' => round($rij['meting']['biomassa_kwh'] * $factor, 1),
                    'temperatuur' => $rij['meting']['temperatuur'],
                    'efficientie' => round($rij['meting']['efficientie'] - abs(sin($dag)), 1),
                ]);
            }

            // Actuele meting = de waarden uit de voorbeeld-JSON
            $centrale->metingen()->create($rij['meting'] + ['gemeten_op' => now()]);

            $centrale->documenten()->create($rij['document']);
        }
    }
}