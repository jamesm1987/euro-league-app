<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GameRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\Admin\GameRules\CreateGameRule;
use App\Http\Requests\Admin\GameRules\UpdateGameRule;

class GameRuleController extends Controller
{

    public function index(Request $request)
    {

        $query = GameRule::query();
        $ruleContexts = array_keys(config('gamerule'));

        return Inertia::render('Admin/GameRule/Index', [
            'rules' => $query->get(),
            'ruleContexts' => $ruleContexts
        ]);
    }

    public function store(CreateGameRule $request)
    {
        $validated = $request->validated();

        $rule = GameRule::create($validated);

        return Redirect::route('admin.rules.index', $rule)
            ->with('success', 'Rule created successfully.');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(GameRule $rule): Response
    {
        return Inertia::render('Admin/GameRule/Edit', [
            'rule' => $rule,
        ]);
    }

    /**
     * Update the game rule.
     */
    public function update(UpdateGameRule $request, GameRule $rule): RedirectResponse
    {
        $validated = $request->validated();
        
        $rule->update($validated);

        return Redirect::route('admin.rules.index', $rule)
            ->with('success', 'Rule updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(GameRule $rule): RedirectResponse
    {
        $rule->delete();

        return Redirect::route('admin.rules.index')
            ->with('success', 'Rule deleted successfully.');
    }
}
