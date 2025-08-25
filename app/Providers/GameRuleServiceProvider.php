<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Points\Evaluators\Contracts\GameRuleEvaluator;
use App\Models\GameRule;

class GameRuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('game_rule_evaluator', function ($app, array $params) {
            $rule = $params['rule'] ?? null;

            if (! $rule instanceof GameRule) {
                throw new \InvalidArgumentException("Expected GameRule instance.");
            }

            $config = config('gamerule');
            $baseNamespace = $config['namespace'];
            $evaluators = $config['evaluators'];

            $evaluatorClass = $baseNamespace . ($evaluators[$rule->context] ?? null);

            if (!$evaluatorClass || !class_exists($evaluatorClass)) {
                throw new \Exception("No evaluator found for context [{$rule->context}]");
            }

            return new $evaluatorClass();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
