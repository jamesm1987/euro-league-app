<?php

namespace App\Points\Contracts;

interface GameRuleEvaluator
{
    public function evaluate(GameRule $rule, mixed $data);
}