<?php

namespace App\Services\GameRules;

use App\Models\GameRule;

class ResultPointsEvaluator extends GameRuleEvaluator
{
    protected string $context = 'result_points';

    protected function applyRule(GameRule $rule, array $fixture): array
    {
        $awards = [];

        $fixtureId =  $fixture['id'];
        $homeScore = $fixture['home_team_score'];
        $awayScore = $fixture['away_team_score'];
        $homeTeamId = $fixture['home_team_id'];
        $awayTeamId = $contextData['away_team_id'];

        $goalDifference = $homeScore - $awayScore;

        switch ($rule->key) {
            
            case 'draw':

                if ($goalDifference  === 0) {
                    $awards[] = ['team_id' => $homeTeamId, 'game_rule_id' => $rule->id];
                    $awards[] = ['team_id' => $awayTeamId, 'game_rule_id' => $rule->id];
                }
            break;

            case 'win':
                
                $winnerId = $goalDifference > 0 ? $homeTeamId : $awayTeamId;

                $awards[] = ['team_id' => $winnerId, 'game_rule_id' => $rule->id];
            
            break;
        }

        return $awards;
    }

    protected function prepareContext(array $data): array
    {
        return $data; // if you ever need to normalize the data
    }
}
