<?php

namespace App\Services\GameRules;

use App\Models\GameRule;

abstract class GameRuleEvaluator implements RuleEvaluatorInterface
{
    protected string $context;

    public function evaluate(array $contextData): int
    {
        $rules = GameRule::where('context', $this->context)
            ->where('active', true)
            ->get();

        $points = 0;

        foreach ($rules as $rule) {
            if ($this->passes($rule, $contextData)) {
                $points += $rule->points;
            }
        }

        return $points;
    }

    abstract protected function passes(GameRule $rule, array $contextData): bool;
}