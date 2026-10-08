<?php

namespace Database\Seeders;

use App\Models\Centrale;
use App\Models\InkomendeMail;
use App\Models\Klant;
use App\Models\Klantmelding;
use App\Models\Melding;
use App\Models\Storing;
use App\Models\User;
use Illuminate\Database\Seeder;

class StoringSeeder extends Seeder
{
    public function run(): void
    {
        $piet = User::where('email', 'piet.technicus@ecopower.test')->first();
        $sanne = User::where('email', 'sanne.technicus@ecopower.test')->first();
        $centrale1 = Centrale::where('naam', 'Centrale 1')->value('id');
        $centrale2 = Centrale::where('naam', 'Centrale 2')->value('id');

        // Voorbeeld-JSON storingen uit de bijlagen van de opdracht
        $s1001 = Storing::create([
            'centrale_id' => $centrale1,
            'gemeld_door' => $piet->id,
            'storingnummer' => 'S-1001',
            'melder_email' => $piet->email,
            'bron' => 'technicus',
            'type' => 'machine',
            'plek_in_fabriek' => 'Omvormerruimte',
            'grootte' => 'groot',
            'urgentie' => 'normaal',
            'status' => 'gemeld',
            'omschrijving' => 'Inverter malfunction reported by technician.',
            'gemeld_op' => '2026-10-01 09:00:00',
        ]);
        $s1001->technici()->attach($piet->id);

        $s1002 = Storing::create([
            'centrale_id' => $centrale2,
            'gemeld_door' => $sanne->id,
            'storingnummer' => 'S-1002',
            'melder_email' => $sanne->email,
            'bron' => 'technicus',
            'type' => 'machine',
            'plek_in_fabriek' => 'Windturbine 2',
            'grootte' => 'gemiddeld',
            'urgentie' => 'hoog',
            'status' => 'in_behandeling',
            'omschrijving' => 'Scheduled maintenance due for turbine.',
            'gemeld_op' => '2026-10-03 14:00:00',
        ]);
        $s1002->technici()->attach($sanne->id);
        $s1002->updates()->create([
            'user_id' => $sanne->id,
            'soort' => 'status',
            'tekst' => 'Status gewijzigd naar In behandeling.',
        ]);

        // Voorbeeld-JSON klantmeldingen uit de bijlagen van de opdracht
        Klantmelding::create([
            'klant_id' => Klant::where('klantnummer', '12345')->value('id'),
            'centrale_id' => $centrale1,
            'meldingnummer' => 'KM-501',
            'type_probleem' => 'Power outage',
            'omschrijving' => 'Experiencing a complete power outage.',
            'status' => 'gemeld',
            'gemeld_op' => '2026-10-02 10:30:00',
        ]);

        Klantmelding::create([
            'klant_id' => Klant::where('klantnummer', '67890')->value('id'),
            'centrale_id' => $centrale2,
            'meldingnummer' => 'KM-502',
            'type_probleem' => 'Low energy output',
            'omschrijving' => 'Not getting expected energy from solar panels.',
            'status' => 'gemeld',
            'gemeld_op' => '2026-10-04 08:15:00',
        ]);

        InkomendeMail::create([
            'afzender' => 'info@bedrijf.nl',
            'onderwerp' => 'Storing turbine',
            'tekst' => 'De turbine bij Centrale 2 maakt een vreemd geluid.',
            'status' => 'nieuw',
        ]);

        Melding::create(['user_id' => $piet->id, 'tekst' => 'Storing S-1001 is aan jou toegewezen.']);
        Melding::create(['user_id' => $sanne->id, 'tekst' => 'Storing S-1002 is aan jou toegewezen.']);
    }
}