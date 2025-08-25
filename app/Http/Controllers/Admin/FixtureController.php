<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Http\Resources\FixtureResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class FixtureController extends Controller
{

    public function index(Request $request)
    {

        $fixtures = FixtureResource::collection(Fixture::with('league','home_team', 'away_team')->get());

        if ($request->filled('league')) {
           $filtered = FixtureResource::collection(
                Fixture::inLeague($request->input('league'))->with('league')->get()
            );
        }

        return Inertia::render('Admin/Fixture/Index', [
            'fixtures' =>  $filtered ?? $fixtures,
            'filters' => $request->only('league'),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Fixture $fixture): Response
    {
        return Inertia::render('Admin/Fixture/Edit', [
            'fixture' => $fixture,
        ]);
    }

    /**
     * Update the competition information.
     */
    public function update(Request $request, Fixture $fixture): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // add other competition fields and validation here
        ]);
        
        $fixture->update($validated);

        return Redirect::route('admin.fixtures.edit', $fixture)
            ->with('success', 'Fixture updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Fixture $fixture): RedirectResponse
    {
        $fixture->delete();

        return Redirect::route('admin.fixtures.index')
            ->with('success', 'Fixture deleted successfully.');
    }
}
