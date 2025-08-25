<?php

namespace App\Points\Services;

use Illuminate\Support\Collection;
use App\Models\Point;
use Illuminate\Support\Facades\Log;
use App\Models\Fixture;
use App\Models\GameRule;

class PointsProcessor
{

    protected function evaluateAll(Collection $rules, mixed $contextData):  void
    {

        $awards = [];

        foreach ($rules as $rule) {
            $evaluator = app('game_rule_evaluator', ['rule' => $rule]);

            $evaluationResults = $evaluator->evaluate($rule, $contextData);

            foreach ($evaluationResults as $teamId => $result) {
                
                $awards[] = $result;

            }
        }

        Log::info($awards);

        if ( !empty ($awards) ) {
            Point::insert($awards);
        }


        
   
    }

    public function evaluateFixture(Fixture $fixture): void
    {
        $rules = GameRule::where('active', 1)
            ->whereIn('context', ['result_points', 'score_points'])
        ->get();

        $this->evaluateAll($rules, $fixture);
        
    }

    public function evaluateLeagueTopScorers(Collection $league): void 
    {
        $rules = GameRule::where('active', 1)
            ->where('context', 'goalscorer_points')
        ->get();

        $this->evaluateAll($rules, $league);
    }

    public function evaluateTrophies(array $trophyWinners): void
    {
        $rules = GameRule::where('active', 1)
            ->where('context', 'trophy_points')
        ->get();

        $this->evaluateAll($rules, $trophyWinners);
        
    }
}