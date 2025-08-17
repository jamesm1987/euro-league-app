<?php

namespace App\Utilities;

use App\Models\GameRule;

class GameRules {

    public static function getGameRuleKeys()
    {
        return GameRule::pluck('key')->toArray();
    }
}