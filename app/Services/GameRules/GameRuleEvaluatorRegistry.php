<?php

namespace App\Services\GameRules;

class GameRuleEvaluatorRegistry
{
    public static function get(): array
    {
        return [
            'result_points' => ResultPointsEvaluator::class,
            'score_points' => ScorePointsEvaluator::class,
            'goalscorer_points' => GoalscorerPointsEvaluator::class,
            'trophy_points' => TrophyPointsEvaluator::class,
        ];
    }
}