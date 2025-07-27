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
            ['Premier League', 'league', 'england', null, 39],
            ['La Liga', 'league', 'spain', null, 140],
            ['Bundesliga', 'league', 'germany', null, 78],
            ['Ligue 1', 'league', 'france', null, 61],
            ['Serie A', 'league', 'italy', null, 135],
            ['FA Cup', 'cup', 'england', null, 45],
            ['DFB Pokal', 'cup', 'germany', null, 81],
            ['Copa del Rey', 'cup', 'spain', null, 143],
            ['Coupe de France', 'cup', 'france', null, 66],
            ['Coppa Italia', 'cup', 'italy', null, 137],
            ['Champions League', 'cup', 'world', null, 2],
            ['Europa League', 'cup', 'world', null, 3],
            ['Europa Conference League', 'cup', 'world', null, 848],
        ];

        foreach ($competitions as [$name, $type, $country, $team_id, $api_id]) {
            Competition::updateOrCreate(
                ['api_id' => $api_id], // Unique constraint
            [
                'name' => $name,
                'type' => $type,
                'team_id' => $team_id,
                'country' => $country,
            ]
        );
        }
    }
}
