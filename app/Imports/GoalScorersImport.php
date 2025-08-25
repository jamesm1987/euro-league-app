<?php

namespace App\Imports;

use App\Services\Api\FootballDataApiClient;
use App\Services\Api\Response;
use App\Services\ApiHelper;
use App\Imports\ImportTypeInterface;
use App\Models\Competition;
use App\Models\GoalScorer;
use Illuminate\Support\Facades\Log;
use App\Models\ApiLookup;
use App\Jobs\SaveApiResponse;
use App\Jobs\ProcessGoalScorerPoints;

class GoalScorersImport implements ImportTypeInterface
{

    protected $apiService;
    protected $apiResponseService;
    protected $apiHelper;

    public function __construct(
        FootballDataApiClient $footballDataApiClient, 
        ApiHelper $apiHelper,
        Response $apiResponseService
    )
    {
        $this->apiService = $footballDataApiClient;
        $this->apiHelper = $apiHelper;
        $this->apiResponseService = $apiResponseService;
    }

    public function fetch()
    {

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'api_id']);

        $response = $this->apiService->getTopGoalscorers($leagues);

        return ApiLookup::where('endpoint', 'goalscorers')->latest();


    }

    public function process($data): void
    {
        $leagueGoalScorers = collect($data)->groupBy('league_id');

        ProcessGoalScorerPoints::dispatch($leagueGoalScorers);
    }

    public function transform($record): array
    {
       $teams = [];

       $competitions = json_decode($record->response, true);

       foreach ($competitions as $competition) {
            

            foreach ($competition as $row) {
                
                $statistics = $row['statistics'][0];
                $league = $statistics['league'];
                $team = $statistics['team'];
                $goals = $statistics['goals'];

                $teams[] = [
                    'team_id' =>$this->apiHelper->getTeamIdByApiId($team['id']),
                    'goals' =>  $goals['total'],
                    'league_id' => $this->apiHelper->getLeagueIdByApiId($league['id'])
                ];
            }
       }
       return $teams;
    }

}
