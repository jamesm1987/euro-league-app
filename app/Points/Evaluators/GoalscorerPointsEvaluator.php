<?php

namespace App\Points\Evaluators;


use App\Points\Contracts\GameRuleEvaluator;
use App\Models\GameRule;
use Illuminate\Support\Collection;
use App\Services\ApiHelper;


class GoalscorerPointsEvaluator implements GameRuleEvaluator
{

    protected $apiHelper;

    public function __construct()
    {
        $this->apiHelper = new ApiHelper();
    }

    public function evaluate($rule, $league) {


        $awards = [];

        $topThree = $this->filterTopThree($league);

        if (count($topThree) > 3) {
            $this->applyTieBreaker();
        }

        switch ($rule->key) {

            case 'league_top_scorer':
                $awards[] = ['team_id' => $league[0]['team_id'], 'game_rule_id' => $rule->id, 'pointable_type' => Competition::class, 'pointable_id' => $league[0]['league_id']];
            break;

            case 'league_second_top_scorer':
                $awards[] = ['team_id' => $league[1]['team_id'], 'game_rule_id' => $rule->id, 'pointable_type' => Competition::class, 'pointable_id' => $league[1]['league_id']];
            break;

            case 'league_third_top_scorer':
                $awards[] = ['team_id' => $league[2]['team_id'], 'game_rule_id' => $rule->id, 'pointable_type' => Competition::class, 'pointable_id' => $league[2]['league_id']];
            break;
        }

        return $awards;
    }

    private function topThreeGoalCount($league)
    {
        $goalCount = collect($league)->unique('goals')->values();

        return $goalCount->take(3);
    }


    private function filterTopThree($league)
    {
        $topThreeGoals = $this->topThreeGoalCount($league);
        $cutOffGoalCount = $topThreeGoals->last()['goals'];

        return collect($league)
            ->filter(fn($player) => $player['goals'] >= $cutOffGoalCount)
            ->values();
    }

    private function applyTieBreaker()
    {
        return "TIE BREAK";
    }
}