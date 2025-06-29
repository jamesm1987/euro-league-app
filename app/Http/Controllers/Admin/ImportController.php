<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Jobs\ImportJob;
use App\Imports\TeamsImport;
use App\Imports\FixturesImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ImportController extends Controller
{
    public function index(Request $request)
    {
        $query = Import::query();

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        return Inertia::render('Admin/Import/Index', [
            'imports' => $query->get(),
            'filters' => $request->only('type'),
        ]);
    }

    public function submit(Request $request)
    {
        $importers = [
            'teams' => TeamsImport::class,
            'fixtures' => FixturesImport::class,
        ];
        if ( $request->filled('type') ) {

            if (!array_key_exists($request->input('type'), $importers)) {
                abort(400, 'Invalid import type');
            }

            $importer = app($importers[$request->input('type')]);

            ImportJob::dispatch($importer);
        }
    }
}