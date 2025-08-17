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

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'api_id']);


        return $this->apiService->getLeagueStandings($leagues);
        
    }

    public function process($data): void
    {

        foreach ($data as $league) {

            $competition_id = $this->apiHelper->getLeagueIdByApiId($cup['league_id']);

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

        $league = [];

        foreach ($data as $row) {
            $league = $row['league'];

            if ($fixture['status']['long'] !== 'Match Finished') {
                continue;
            }

            $competitions[] = [
                'team_id' => $teams['home']['winner'] ? $teams['home']['id'] : $teams['away']['id'],
                'league_id'  => $league['id'],
            ];
        }

       return $competitions;
    }

}
