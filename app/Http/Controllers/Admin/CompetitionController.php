<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class CompetitionController extends Controller
{

    public function index(Request $request)
    {

        $query = Competition::query();

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }



        return Inertia::render('Admin/Competition/Index', [
            'competitions' => $query->get(),
            'filters' => $request->only('type'),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Competition $competition): Response
    {
        return Inertia::render('Admin/Competition/Edit', [
            'competition' => $competition,
        ]);
    }

    /**
     * Update the competition information.
     */
    public function update(Request $request, Competition $competition): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // add other competition fields and validation here
        ]);
        
        $competition->update($validated);

        return Redirect::route('admin.competitions.edit', $competition)
            ->with('success', 'Competition updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Competition $competition): RedirectResponse
    {
        $competition->delete();

        return Redirect::route('admin.competitions.index')
            ->with('success', 'Competition deleted successfully.');
    }
}
