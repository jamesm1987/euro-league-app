<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Competition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use App\Http\Resources\TeamResource;

class TeamPickerController extends Controller
{

    public function index(Request $request)
    {

        $teams = TeamResource::collection(
            Team::with('league')->get()
        )->resolve();

        $leagues = Competition::where('type', 'league')
            ->get(['id', 'name'])
            ->toArray();
        
        return Inertia::render('teams-picker', [
            'teams' => $teams,
            'leagues' => $leagues,
        ]);

    }
}