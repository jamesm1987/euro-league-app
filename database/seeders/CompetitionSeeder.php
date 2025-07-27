<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competitions = [
            ['Premier League', 'league', 'england', 39],
            ['La Liga', 'league', 'spain', 140],
            ['Bundesliga', 'league', 'germany', 78],
            ['Ligue 1', 'league', 'france', 61],
            ['Serie A', 'league', 'italy', 135],
            ['FA Cup', 'cup', 'england', 45],
            ['DFB Pokal', 'cup', 'germany', 81],
            ['Copa del Rey', 'cup', 'spain', 143],
            ['Coupe de France', 'cup', 'france', 66],
            ['Coppa Italia', 'cup', 'italy', 137],
            ['Champions League', 'cup', 'world', 2],
            ['Europa League', 'cup', 'world', 3],
            ['Europa Conference League', 'cup', 'world', 848],
        ];

        foreach ($competitions as [$name, $type, $country, $api_id]) {
            Competition::updateOrCreate(
                ['api_id' => $api_id], // Unique constraint
            [
                'name' => $name,
                'type' => $type,
                'country' => $country,
            ]
        );
        }
    }
}
