<?php

namespace App\Services\GameRules;

use App\Models\GameRule;

abstract class GameRuleEvaluator implements RuleEvaluatorInterface
{
    protected string $context;

    /**
     * Evaluate all active rules in this context against the given data.
     * Returns an array of award payloads.
     */
    public function evaluate(array $contextData): array
    {
        $rules = GameRule::where('context', $this->context)
            ->where('active', true)
            ->get();

        $awards = [];

        foreach ($rules as $rule) {
            $results = $this->applyRule($rule, $contextData);

            foreach ($results as $award) {
                $awards[] = $award;
            }
        }

        return $awards;
    }

    /**
     * Given a rule and context, return an array of awards (or empty array if rule doesn't apply).
     */
    abstract protected function applyRule(GameRule $rule, array $contextData): array;


    abstract protected function prepareContext(array $data): array;
}
