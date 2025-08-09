<?php

namespace App\Points\Evaluators;

use App\Points\Contracts\GameRuleEvaluator;
use App\Models\GameRule;


class ScorePointsEvaluator implements GameRuleEvaluator
{

    public function evaluate($rule, $fixture) {


        $awards = [];

        $homeScore = $fixture['home_team_score'];
        $awayScore = $fixture['away_team_score'];
        $homeTeamId = $fixture['home_team_id'];
        $awayTeamId = $fixture['away_team_id'];

        $goalDifference = $homeScore - $awayScore;

        switch ($rule->key) {
            
            case 'home_win':
                
                if ($goalDifference >= $rule->margin) {
                    $awards[] = ['team_id' => $homeTeamId, 'game_rule_id' => $rule->id, 'pointable_type' => $fixture::class, 'pointable_id' => $fixture->id];
                }
            
            break;

            case 'away_win':

                if ($goalDifference <= -$rule->margin) {
                    $awards[] = ['team_id' => $awayTeamId, 'game_rule_id' => $rule->id, 'pointable_type' => $fixture::class, 'pointable_id' => $fixture->id];
                }

            break;

            case 'home_defeat':

                if ($goalDifference <= -$rule->margin) {
                    $awards[] = ['team_id' => $homeTeamId, 'game_rule_id' => $rule->id, 'pointable_type' => $fixture::class, 'pointable_id' => $fixture->id];
                }

            break;

            case 'away_defeat':

                if ($goalDifference >= $rule->margin) {
                    $awards[] = ['team_id' => $awayTeamId, 'game_rule_id' => $rule->id, 'pointable_type' => $fixture::class, 'pointable_id' => $fixture->id];
                }

            break;            
        }

        return $awards;
    }
}