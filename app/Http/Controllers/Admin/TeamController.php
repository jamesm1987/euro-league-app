<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Competition;
use App\Http\Resources\TeamResource;
use App\Http\Resources\LeagueResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TeamController extends Controller
{

    public function index(Request $request)
    {

        $leagues = LeagueResource::collection(Competition::where('type', 'league')->get());
        $teams = TeamResource::collection(Team::with('league')->get());

        if ($request->filled('league')) {
           $filtered = TeamResource::collection(
                Team::inLeague($request->input('league'))->with('league')->get()
            );
        }

        return Inertia::render('Admin/Team/Index', [
            'leagues' => $leagues,
            'teams' =>  $filtered ?? $teams,
            'filters' => $request->only('type'),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Team $team): Response
    {
        return Inertia::render('Admin/Team/Edit', [
            'team' => $team,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function show(Team $team): Response
    {
        return Inertia::render('Admin/Team/Show', [
            'team' => $team,
        ]);
    }


    /**
     * Update the competition information.
     */
    public function update(Request $request, Team $team): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // add other team fields and validation here
        ]);
        
        $team->update($validated);

        return Redirect::route('admin.teams.edit', $team)
            ->with('success', 'Team updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Team $team): RedirectResponse
    {
        $team->delete();

        return Redirect::route('admin.teams.index')
            ->with('success', 'Team deleted successfully.');
    }
}
