<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TeamController extends Controller
{

    public function index(Request $request)
    {

        $query = Team::query();

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }



        return Inertia::render('Admin/Team/Index', [
            'teams' => $query->get(),
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
