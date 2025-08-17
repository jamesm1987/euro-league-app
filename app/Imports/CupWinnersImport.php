<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\GameRule;
use App\Models\Point;
use Illuminate\Support\Facades\Log;
use App\Services\ApiHelper;
use App\Events\FixtureFinalized;

class CupWinnersImport implements ImportTypeInterface
{

    protected $apiService;
    protected $apiHelper;

    public function __construct(FootballDataApiClient $footballDataApiClient, ApiHelper $apiHelper)
    {
        $this->apiService = $footballDataApiClient;
        $this->apiHelper = $apiHelper;
    }

    public function fetch()
    {

        // $cups = Competition::where('type', 'cup')
        //     ->get(['id', 'api_id']);


        // return $this->apiService->getCupWinners($cups);

        $data = require database_path('seeders/trophys-api.php');
        
        return $data;

    }

    public function process($data): void
    {

        foreach ($data as $cup) {

            $competition_id = $this->apiHelper->getCupIdByApiId($cup['league_id']);

            $gameRule = null;
            if (!empty($competition_id)) {
                $gameRule = GameRule::where('competition_id', $competition_id)->first();
            }

            if (!$gameRule) {
                $gameRule = GameRule::where('key', 'cup_win')->first();
            }


            Point::updateOrCreate(
                ['pointable_id' => $competition_id],
                [
                    'team_id' => $this->apiHelper->getTeamIdByApiId($cup['team_id']),
                    'pointable_type' => Competition::class,
                    'game_rule_id' => $gameRule->id
                ]
            );

        }

    }

    public function transform(array $data): array
    {

        $competitions = [];

        foreach ($data as $row) {
            $fixture = $row['fixture'];
            $teams = $row['teams'];
            $league = $row['league'];

            if ($fixture['status']['long'] !== 'Match Finished') {
                return [];
            }

            $competitions[] = [
                'team_id' => $teams['home']['winner'] ? $teams['home']['id'] : $teams['away']['id'],
                'league_id'  => $league['id'],
            ];
        }

       return $competitions;
    }

}
