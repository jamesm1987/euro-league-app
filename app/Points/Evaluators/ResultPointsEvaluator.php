<?php

namespace App\Points\Evaluators;


use App\Points\Contracts\GameRuleEvaluator;
use App\Models\GameRule;

class ResultPointsEvaluator implements GameRuleEvaluator
{

    public function evaluate($rule, $fixture) {


        $awards = [];

        $homeScore = $fixture['home_team_score'];
        $awayScore = $fixture['away_team_score'];
        $homeTeamId = $fixture['home_team_id'];
        $awayTeamId = $fixture['away_team_id'];

        $goalDifference = $homeScore - $awayScore;

        switch ($rule->key) {
            
            case 'draw':

                if ($goalDifference  === 0) {
                    $awards[] = ['team_id' => $homeTeamId, 'game_rule_id' => $rule->id, 'pointable_type' => $fixture::class, 'pointable_id' => $fixture->id];
                    $awards[] = ['team_id' => $awayTeamId, 'game_rule_id' => $rule->id, 'pointable_type' => $fixture::class, 'pointable_id' => $fixture->id];
                }
            break;

            case 'win':

                if ($goalDifference === 0 ) {
                    break;
                }
                
                $teamId = $goalDifference > 0 ? $homeTeamId : $awayTeamId;

                $awards[] = ['team_id' => $teamId, 'game_rule_id' => $rule->id, 'pointable_type' => $fixture::class, 'pointable_id' => $fixture->id];
            
            break;
        }

        return $awards;
    }
}