<?php

namespace App\Services\GameRules;

interface RuleEvaluatorInterface
{
    public function evaluate(array $contextData): int;
}