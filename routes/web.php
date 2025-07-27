<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\GameRuleController;
use App\Http\Controllers\Admin\ImportController;

use App\Http\Controllers\TeamPickerController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('team-picker', [TeamPickerController::class, 'index']);
});


// admin routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::resource('settings/rules', GameRuleController::class);
        Route::resource('competitions', CompetitionController::class);
        Route::resource('teams', TeamController::class);
        Route::get('/import', [ImportController::class, 'index'])->name('imports.index');
        Route::post('/import', [ImportController::class, 'submit'])->name('imports.submit');
    });

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';