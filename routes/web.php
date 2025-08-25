<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\FixtureController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\GameRuleController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

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
        Route::resource('fixtures', FixtureController::class);
        Route::resource('teams', TeamController::class);
        Route::get('/import', [ImportController::class, 'index'])->name('imports.index');
        Route::post('/import', [ImportController::class, 'submit'])->name('imports.submit');
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    });

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';


Route::get('/update-fixtures', function () {


$fixtures = [
['id' => 1, 'home_team_id' => 1, 'away_team_id' => 4],
['id' => 2, 'home_team_id' => 20, 'away_team_id' => 6],
['id' => 3, 'home_team_id' => 8, 'away_team_id' => 5],
['id' => 4, 'home_team_id' => 9, 'away_team_id' => 15],
['id' => 5, 'home_team_id' => 2, 'away_team_id' => 7],
['id' => 6, 'home_team_id' => 18, 'away_team_id' => 3],
['id' => 7, 'home_team_id' => 12, 'away_team_id' => 19],
['id' => 8, 'home_team_id' => 17, 'away_team_id' => 16],
['id' => 9, 'home_team_id' => 13, 'away_team_id' => 14],
['id' => 10, 'home_team_id' => 10, 'away_team_id' => 11],
['id' => 11, 'home_team_id' => 15, 'away_team_id' => 1],
['id' => 12, 'home_team_id' => 16, 'away_team_id' => 12],
['id' => 13, 'home_team_id' => 4, 'away_team_id' => 10],
['id' => 14, 'home_team_id' => 14, 'away_team_id' => 20],
['id' => 15, 'home_team_id' => 7, 'away_team_id' => 18],
['id' => 16, 'home_team_id' => 11, 'away_team_id' => 9],
['id' => 17, 'home_team_id' => 19, 'away_team_id' => 8],
['id' => 18, 'home_team_id' => 3, 'away_team_id' => 2],
['id' => 19, 'home_team_id' => 5, 'away_team_id' => 13],
['id' => 20, 'home_team_id' => 6, 'away_team_id' => 17],
['id' => 21, 'home_team_id' => 8, 'away_team_id' => 15],
['id' => 22, 'home_team_id' => 17, 'away_team_id' => 7],
['id' => 23, 'home_team_id' => 9, 'away_team_id' => 3],
['id' => 24, 'home_team_id' => 20, 'away_team_id' => 4],
['id' => 25, 'home_team_id' => 10, 'away_team_id' => 19],
['id' => 26, 'home_team_id' => 18, 'away_team_id' => 5],
['id' => 27, 'home_team_id' => 12, 'away_team_id' => 14],
['id' => 28, 'home_team_id' => 13, 'away_team_id' => 16],
['id' => 29, 'home_team_id' => 2, 'away_team_id' => 11],
['id' => 30, 'home_team_id' => 1, 'away_team_id' => 6],
['id' => 31, 'home_team_id' => 7, 'away_team_id' => 1],
['id' => 32, 'home_team_id' => 15, 'away_team_id' => 20],
['id' => 33, 'home_team_id' => 16, 'away_team_id' => 10],
['id' => 34, 'home_team_id' => 4, 'away_team_id' => 12],
['id' => 35, 'home_team_id' => 6, 'away_team_id' => 18],
['id' => 36, 'home_team_id' => 14, 'away_team_id' => 17],
['id' => 37, 'home_team_id' => 19, 'away_team_id' => 9],
['id' => 38, 'home_team_id' => 3, 'away_team_id' => 13],
['id' => 39, 'home_team_id' => 11, 'away_team_id' => 8],
['id' => 40, 'home_team_id' => 5, 'away_team_id' => 2],
['id' => 41, 'home_team_id' => 12, 'away_team_id' => 13],
['id' => 42, 'home_team_id' => 19, 'away_team_id' => 5],
['id' => 43, 'home_team_id' => 4, 'away_team_id' => 2],
['id' => 44, 'home_team_id' => 10, 'away_team_id' => 9],
['id' => 45, 'home_team_id' => 6, 'away_team_id' => 3],
['id' => 46, 'home_team_id' => 7, 'away_team_id' => 20],
['id' => 47, 'home_team_id' => 11, 'away_team_id' => 17],
['id' => 48, 'home_team_id' => 16, 'away_team_id' => 1],
['id' => 49, 'home_team_id' => 15, 'away_team_id' => 18],
['id' => 50, 'home_team_id' => 14, 'away_team_id' => 8],
['id' => 51, 'home_team_id' => 2, 'away_team_id' => 14],
['id' => 52, 'home_team_id' => 8, 'away_team_id' => 10],
['id' => 53, 'home_team_id' => 17, 'away_team_id' => 12],
['id' => 54, 'home_team_id' => 13, 'away_team_id' => 15],
['id' => 55, 'home_team_id' => 9, 'away_team_id' => 16],
['id' => 56, 'home_team_id' => 18, 'away_team_id' => 4],
['id' => 57, 'home_team_id' => 5, 'away_team_id' => 6],
['id' => 58, 'home_team_id' => 20, 'away_team_id' => 19],
['id' => 59, 'home_team_id' => 1, 'away_team_id' => 11],
['id' => 60, 'home_team_id' => 3, 'away_team_id' => 7],
['id' => 61, 'home_team_id' => 16, 'away_team_id' => 6],
['id' => 62, 'home_team_id' => 8, 'away_team_id' => 7],
['id' => 63, 'home_team_id' => 17, 'away_team_id' => 5],
['id' => 64, 'home_team_id' => 10, 'away_team_id' => 3],
['id' => 65, 'home_team_id' => 14, 'away_team_id' => 4],
['id' => 66, 'home_team_id' => 12, 'away_team_id' => 20],
['id' => 67, 'home_team_id' => 9, 'away_team_id' => 2],
['id' => 68, 'home_team_id' => 19, 'away_team_id' => 1],
['id' => 69, 'home_team_id' => 13, 'away_team_id' => 18],
['id' => 70, 'home_team_id' => 15, 'away_team_id' => 11],
['id' => 71, 'home_team_id' => 11, 'away_team_id' => 12],
['id' => 72, 'home_team_id' => 4, 'away_team_id' => 19],
['id' => 73, 'home_team_id' => 1, 'away_team_id' => 17],
['id' => 74, 'home_team_id' => 2, 'away_team_id' => 15],
['id' => 75, 'home_team_id' => 7, 'away_team_id' => 10],
['id' => 76, 'home_team_id' => 20, 'away_team_id' => 9],
['id' => 77, 'home_team_id' => 3, 'away_team_id' => 8],
['id' => 78, 'home_team_id' => 5, 'away_team_id' => 14],
['id' => 79, 'home_team_id' => 6, 'away_team_id' => 13],
['id' => 80, 'home_team_id' => 18, 'away_team_id' => 16],
['id' => 81, 'home_team_id' => 10, 'away_team_id' => 18],
['id' => 82, 'home_team_id' => 19, 'away_team_id' => 3],
['id' => 83, 'home_team_id' => 17, 'away_team_id' => 20],
['id' => 84, 'home_team_id' => 15, 'away_team_id' => 5],
['id' => 85, 'home_team_id' => 14, 'away_team_id' => 7],
['id' => 86, 'home_team_id' => 9, 'away_team_id' => 4],
['id' => 87, 'home_team_id' => 13, 'away_team_id' => 2],
['id' => 88, 'home_team_id' => 16, 'away_team_id' => 11],
['id' => 89, 'home_team_id' => 12, 'away_team_id' => 1],
['id' => 90, 'home_team_id' => 8, 'away_team_id' => 6],
['id' => 91, 'home_team_id' => 2, 'away_team_id' => 8],
['id' => 92, 'home_team_id' => 3, 'away_team_id' => 14],
['id' => 93, 'home_team_id' => 20, 'away_team_id' => 10],
['id' => 94, 'home_team_id' => 6, 'away_team_id' => 15],
['id' => 95, 'home_team_id' => 18, 'away_team_id' => 12],
['id' => 96, 'home_team_id' => 7, 'away_team_id' => 9],
['id' => 97, 'home_team_id' => 5, 'away_team_id' => 16],
['id' => 98, 'home_team_id' => 11, 'away_team_id' => 19],
['id' => 99, 'home_team_id' => 1, 'away_team_id' => 13],
['id' => 100, 'home_team_id' => 4, 'away_team_id' => 17],
['id' => 101, 'home_team_id' => 17, 'away_team_id' => 3],
['id' => 102, 'home_team_id' => 16, 'away_team_id' => 4],
['id' => 103, 'home_team_id' => 12, 'away_team_id' => 9],
['id' => 104, 'home_team_id' => 5, 'away_team_id' => 7],
['id' => 105, 'home_team_id' => 15, 'away_team_id' => 14],
['id' => 106, 'home_team_id' => 6, 'away_team_id' => 19],
['id' => 107, 'home_team_id' => 1, 'away_team_id' => 10],
['id' => 108, 'home_team_id' => 18, 'away_team_id' => 2],
['id' => 109, 'home_team_id' => 11, 'away_team_id' => 20],
['id' => 110, 'home_team_id' => 13, 'away_team_id' => 8],
['id' => 111, 'home_team_id' => 10, 'away_team_id' => 13],
['id' => 112, 'home_team_id' => 8, 'away_team_id' => 18],
['id' => 113, 'home_team_id' => 19, 'away_team_id' => 16],
['id' => 114, 'home_team_id' => 3, 'away_team_id' => 15],
['id' => 115, 'home_team_id' => 9, 'away_team_id' => 17],
['id' => 116, 'home_team_id' => 4, 'away_team_id' => 5],
['id' => 117, 'home_team_id' => 14, 'away_team_id' => 11],
['id' => 118, 'home_team_id' => 7, 'away_team_id' => 6],
['id' => 119, 'home_team_id' => 20, 'away_team_id' => 1],
['id' => 120, 'home_team_id' => 2, 'away_team_id' => 12],
['id' => 121, 'home_team_id' => 15, 'away_team_id' => 7],
['id' => 122, 'home_team_id' => 17, 'away_team_id' => 10],
['id' => 123, 'home_team_id' => 16, 'away_team_id' => 2],
['id' => 124, 'home_team_id' => 18, 'away_team_id' => 20],
['id' => 125, 'home_team_id' => 5, 'away_team_id' => 3],
['id' => 126, 'home_team_id' => 12, 'away_team_id' => 8],
['id' => 127, 'home_team_id' => 13, 'away_team_id' => 19],
['id' => 128, 'home_team_id' => 1, 'away_team_id' => 9],
['id' => 129, 'home_team_id' => 11, 'away_team_id' => 4],
['id' => 130, 'home_team_id' => 6, 'away_team_id' => 14],
['id' => 131, 'home_team_id' => 20, 'away_team_id' => 16],
['id' => 132, 'home_team_id' => 10, 'away_team_id' => 12],
['id' => 133, 'home_team_id' => 9, 'away_team_id' => 5],
['id' => 134, 'home_team_id' => 14, 'away_team_id' => 18],
['id' => 135, 'home_team_id' => 2, 'away_team_id' => 6],
['id' => 136, 'home_team_id' => 7, 'away_team_id' => 13],
['id' => 137, 'home_team_id' => 8, 'away_team_id' => 1],
['id' => 138, 'home_team_id' => 19, 'away_team_id' => 17],
['id' => 139, 'home_team_id' => 4, 'away_team_id' => 15],
['id' => 140, 'home_team_id' => 3, 'away_team_id' => 11],
['id' => 141, 'home_team_id' => 19, 'away_team_id' => 7],
['id' => 142, 'home_team_id' => 17, 'away_team_id' => 2],
['id' => 143, 'home_team_id' => 16, 'away_team_id' => 14],
['id' => 144, 'home_team_id' => 1, 'away_team_id' => 18],
['id' => 145, 'home_team_id' => 4, 'away_team_id' => 8],
['id' => 146, 'home_team_id' => 20, 'away_team_id' => 3],
['id' => 147, 'home_team_id' => 10, 'away_team_id' => 15],
['id' => 148, 'home_team_id' => 11, 'away_team_id' => 13],
['id' => 149, 'home_team_id' => 12, 'away_team_id' => 5],
['id' => 150, 'home_team_id' => 9, 'away_team_id' => 6],
['id' => 151, 'home_team_id' => 8, 'away_team_id' => 9],
['id' => 152, 'home_team_id' => 6, 'away_team_id' => 4],
['id' => 153, 'home_team_id' => 2, 'away_team_id' => 10],
['id' => 154, 'home_team_id' => 5, 'away_team_id' => 20],
['id' => 155, 'home_team_id' => 18, 'away_team_id' => 19],
['id' => 156, 'home_team_id' => 15, 'away_team_id' => 16],
['id' => 157, 'home_team_id' => 14, 'away_team_id' => 1],
['id' => 158, 'home_team_id' => 13, 'away_team_id' => 17],
['id' => 159, 'home_team_id' => 7, 'away_team_id' => 11],
['id' => 160, 'home_team_id' => 3, 'away_team_id' => 12],
['id' => 161, 'home_team_id' => 19, 'away_team_id' => 14],
['id' => 162, 'home_team_id' => 17, 'away_team_id' => 18],
['id' => 163, 'home_team_id' => 20, 'away_team_id' => 2],
['id' => 164, 'home_team_id' => 12, 'away_team_id' => 15],
['id' => 165, 'home_team_id' => 16, 'away_team_id' => 8],
['id' => 166, 'home_team_id' => 9, 'away_team_id' => 13],
['id' => 167, 'home_team_id' => 4, 'away_team_id' => 7],
['id' => 168, 'home_team_id' => 10, 'away_team_id' => 5],
['id' => 169, 'home_team_id' => 1, 'away_team_id' => 3],
['id' => 170, 'home_team_id' => 11, 'away_team_id' => 6],
['id' => 171, 'home_team_id' => 14, 'away_team_id' => 9],
['id' => 172, 'home_team_id' => 3, 'away_team_id' => 16],
['id' => 173, 'home_team_id' => 13, 'away_team_id' => 4],
['id' => 174, 'home_team_id' => 2, 'away_team_id' => 19],
['id' => 175, 'home_team_id' => 18, 'away_team_id' => 11],
['id' => 176, 'home_team_id' => 7, 'away_team_id' => 12],
['id' => 177, 'home_team_id' => 5, 'away_team_id' => 1],
['id' => 178, 'home_team_id' => 6, 'away_team_id' => 10],
['id' => 179, 'home_team_id' => 15, 'away_team_id' => 17],
['id' => 180, 'home_team_id' => 8, 'away_team_id' => 20],
['id' => 181, 'home_team_id' => 10, 'away_team_id' => 14],
['id' => 182, 'home_team_id' => 16, 'away_team_id' => 7],
['id' => 183, 'home_team_id' => 9, 'away_team_id' => 18],
['id' => 184, 'home_team_id' => 4, 'away_team_id' => 3],
['id' => 185, 'home_team_id' => 11, 'away_team_id' => 5],
['id' => 186, 'home_team_id' => 12, 'away_team_id' => 6],
['id' => 187, 'home_team_id' => 19, 'away_team_id' => 15],
['id' => 188, 'home_team_id' => 20, 'away_team_id' => 13],
['id' => 189, 'home_team_id' => 1, 'away_team_id' => 2],
['id' => 190, 'home_team_id' => 17, 'away_team_id' => 8],
['id' => 191, 'home_team_id' => 11, 'away_team_id' => 2],
['id' => 192, 'home_team_id' => 19, 'away_team_id' => 10],
['id' => 193, 'home_team_id' => 3, 'away_team_id' => 9],
['id' => 194, 'home_team_id' => 16, 'away_team_id' => 13],
['id' => 195, 'home_team_id' => 14, 'away_team_id' => 12],
['id' => 196, 'home_team_id' => 7, 'away_team_id' => 17],
['id' => 197, 'home_team_id' => 15, 'away_team_id' => 8],
['id' => 198, 'home_team_id' => 4, 'away_team_id' => 20],
['id' => 199, 'home_team_id' => 6, 'away_team_id' => 1],
['id' => 200, 'home_team_id' => 5, 'away_team_id' => 18],
['id' => 201, 'home_team_id' => 17, 'away_team_id' => 14],
['id' => 202, 'home_team_id' => 12, 'away_team_id' => 4],
['id' => 203, 'home_team_id' => 13, 'away_team_id' => 3],
['id' => 204, 'home_team_id' => 18, 'away_team_id' => 6],
['id' => 205, 'home_team_id' => 9, 'away_team_id' => 19],
['id' => 206, 'home_team_id' => 10, 'away_team_id' => 16],
['id' => 207, 'home_team_id' => 2, 'away_team_id' => 5],
['id' => 208, 'home_team_id' => 8, 'away_team_id' => 11],
['id' => 209, 'home_team_id' => 20, 'away_team_id' => 15],
['id' => 210, 'home_team_id' => 1, 'away_team_id' => 7],
['id' => 211, 'home_team_id' => 2, 'away_team_id' => 3],
['id' => 212, 'home_team_id' => 17, 'away_team_id' => 6],
['id' => 213, 'home_team_id' => 10, 'away_team_id' => 4],
['id' => 214, 'home_team_id' => 12, 'away_team_id' => 16],
['id' => 215, 'home_team_id' => 8, 'away_team_id' => 19],
['id' => 216, 'home_team_id' => 9, 'away_team_id' => 11],
['id' => 217, 'home_team_id' => 1, 'away_team_id' => 15],
['id' => 218, 'home_team_id' => 18, 'away_team_id' => 7],
['id' => 219, 'home_team_id' => 20, 'away_team_id' => 14],
['id' => 220, 'home_team_id' => 13, 'away_team_id' => 5],
['id' => 221, 'home_team_id' => 3, 'away_team_id' => 18],
['id' => 222, 'home_team_id' => 15, 'away_team_id' => 9],
['id' => 223, 'home_team_id' => 6, 'away_team_id' => 20],
['id' => 224, 'home_team_id' => 7, 'away_team_id' => 2],
['id' => 225, 'home_team_id' => 5, 'away_team_id' => 8],
['id' => 226, 'home_team_id' => 14, 'away_team_id' => 13],
['id' => 227, 'home_team_id' => 16, 'away_team_id' => 17],
['id' => 228, 'home_team_id' => 11, 'away_team_id' => 10],
['id' => 229, 'home_team_id' => 19, 'away_team_id' => 12],
['id' => 230, 'home_team_id' => 4, 'away_team_id' => 1],
['id' => 231, 'home_team_id' => 18, 'away_team_id' => 15],
['id' => 232, 'home_team_id' => 3, 'away_team_id' => 6],
['id' => 233, 'home_team_id' => 9, 'away_team_id' => 10],
['id' => 234, 'home_team_id' => 20, 'away_team_id' => 7],
['id' => 235, 'home_team_id' => 2, 'away_team_id' => 4],
['id' => 236, 'home_team_id' => 5, 'away_team_id' => 19],
['id' => 237, 'home_team_id' => 17, 'away_team_id' => 11],
['id' => 238, 'home_team_id' => 1, 'away_team_id' => 16],
['id' => 239, 'home_team_id' => 8, 'away_team_id' => 14],
['id' => 240, 'home_team_id' => 13, 'away_team_id' => 12],
['id' => 241, 'home_team_id' => 15, 'away_team_id' => 13],
['id' => 242, 'home_team_id' => 10, 'away_team_id' => 8],
['id' => 243, 'home_team_id' => 19, 'away_team_id' => 20],
['id' => 244, 'home_team_id' => 4, 'away_team_id' => 18],
['id' => 245, 'home_team_id' => 14, 'away_team_id' => 2],
['id' => 246, 'home_team_id' => 7, 'away_team_id' => 3],
['id' => 247, 'home_team_id' => 12, 'away_team_id' => 17],
['id' => 248, 'home_team_id' => 16, 'away_team_id' => 9],
['id' => 249, 'home_team_id' => 6, 'away_team_id' => 5],
['id' => 250, 'home_team_id' => 11, 'away_team_id' => 1],
['id' => 251, 'home_team_id' => 10, 'away_team_id' => 17],
['id' => 252, 'home_team_id' => 9, 'away_team_id' => 1],
['id' => 253, 'home_team_id' => 8, 'away_team_id' => 12],
['id' => 254, 'home_team_id' => 3, 'away_team_id' => 5],
['id' => 255, 'home_team_id' => 4, 'away_team_id' => 16],
['id' => 256, 'home_team_id' => 20, 'away_team_id' => 11],
['id' => 257, 'home_team_id' => 7, 'away_team_id' => 15],
['id' => 258, 'home_team_id' => 19, 'away_team_id' => 13],
['id' => 259, 'home_team_id' => 2, 'away_team_id' => 18],
['id' => 260, 'home_team_id' => 14, 'away_team_id' => 6],
['id' => 261, 'home_team_id' => 15, 'away_team_id' => 3],
['id' => 262, 'home_team_id' => 5, 'away_team_id' => 4],
['id' => 263, 'home_team_id' => 16, 'away_team_id' => 19],
['id' => 264, 'home_team_id' => 13, 'away_team_id' => 7],
['id' => 265, 'home_team_id' => 17, 'away_team_id' => 9],
['id' => 266, 'home_team_id' => 18, 'away_team_id' => 8],
['id' => 267, 'home_team_id' => 11, 'away_team_id' => 14],
['id' => 268, 'home_team_id' => 1, 'away_team_id' => 20],
['id' => 269, 'home_team_id' => 6, 'away_team_id' => 2],
['id' => 270, 'home_team_id' => 12, 'away_team_id' => 10],
['id' => 271, 'home_team_id' => 18, 'away_team_id' => 14],
['id' => 272, 'home_team_id' => 15, 'away_team_id' => 4],
['id' => 273, 'home_team_id' => 16, 'away_team_id' => 20],
['id' => 274, 'home_team_id' => 6, 'away_team_id' => 7],
['id' => 275, 'home_team_id' => 17, 'away_team_id' => 19],
['id' => 276, 'home_team_id' => 5, 'away_team_id' => 9],
['id' => 277, 'home_team_id' => 13, 'away_team_id' => 10],
['id' => 278, 'home_team_id' => 11, 'away_team_id' => 3],
['id' => 279, 'home_team_id' => 1, 'away_team_id' => 8],
['id' => 280, 'home_team_id' => 12, 'away_team_id' => 2],
['id' => 281, 'home_team_id' => 19, 'away_team_id' => 6],
['id' => 282, 'home_team_id' => 9, 'away_team_id' => 12],
['id' => 283, 'home_team_id' => 20, 'away_team_id' => 18],
['id' => 284, 'home_team_id' => 14, 'away_team_id' => 15],
['id' => 285, 'home_team_id' => 7, 'away_team_id' => 5],
['id' => 286, 'home_team_id' => 3, 'away_team_id' => 17],
['id' => 287, 'home_team_id' => 8, 'away_team_id' => 13],
['id' => 288, 'home_team_id' => 4, 'away_team_id' => 11],
['id' => 289, 'home_team_id' => 10, 'away_team_id' => 1],
['id' => 290, 'home_team_id' => 2, 'away_team_id' => 16],
['id' => 291, 'home_team_id' => 8, 'away_team_id' => 4],
['id' => 292, 'home_team_id' => 5, 'away_team_id' => 12],
['id' => 293, 'home_team_id' => 18, 'away_team_id' => 1],
['id' => 294, 'home_team_id' => 3, 'away_team_id' => 20],
['id' => 295, 'home_team_id' => 15, 'away_team_id' => 19],
['id' => 296, 'home_team_id' => 14, 'away_team_id' => 10],
['id' => 297, 'home_team_id' => 2, 'away_team_id' => 17],
['id' => 298, 'home_team_id' => 7, 'away_team_id' => 16],
['id' => 299, 'home_team_id' => 6, 'away_team_id' => 9],
['id' => 300, 'home_team_id' => 13, 'away_team_id' => 11],
['id' => 301, 'home_team_id' => 9, 'away_team_id' => 8],
['id' => 302, 'home_team_id' => 16, 'away_team_id' => 15],
['id' => 303, 'home_team_id' => 20, 'away_team_id' => 5],
['id' => 304, 'home_team_id' => 12, 'away_team_id' => 3],
['id' => 305, 'home_team_id' => 19, 'away_team_id' => 18],
['id' => 306, 'home_team_id' => 17, 'away_team_id' => 13],
['id' => 307, 'home_team_id' => 4, 'away_team_id' => 6],
['id' => 308, 'home_team_id' => 11, 'away_team_id' => 7],
['id' => 309, 'home_team_id' => 1, 'away_team_id' => 14],
['id' => 310, 'home_team_id' => 10, 'away_team_id' => 2],
['id' => 311, 'home_team_id' => 14, 'away_team_id' => 16],
['id' => 312, 'home_team_id' => 15, 'away_team_id' => 10],
['id' => 313, 'home_team_id' => 18, 'away_team_id' => 9],
['id' => 314, 'home_team_id' => 7, 'away_team_id' => 19],
['id' => 315, 'home_team_id' => 8, 'away_team_id' => 17],
['id' => 316, 'home_team_id' => 13, 'away_team_id' => 20],
['id' => 317, 'home_team_id' => 6, 'away_team_id' => 12],
['id' => 318, 'home_team_id' => 5, 'away_team_id' => 11],
['id' => 319, 'home_team_id' => 2, 'away_team_id' => 1],
['id' => 320, 'home_team_id' => 3, 'away_team_id' => 4],
['id' => 321, 'home_team_id' => 17, 'away_team_id' => 15],
['id' => 322, 'home_team_id' => 16, 'away_team_id' => 3],
['id' => 323, 'home_team_id' => 9, 'away_team_id' => 14],
['id' => 324, 'home_team_id' => 12, 'away_team_id' => 7],
['id' => 325, 'home_team_id' => 19, 'away_team_id' => 2],
['id' => 326, 'home_team_id' => 4, 'away_team_id' => 13],
['id' => 327, 'home_team_id' => 20, 'away_team_id' => 8],
['id' => 328, 'home_team_id' => 1, 'away_team_id' => 5],
['id' => 329, 'home_team_id' => 10, 'away_team_id' => 6],
['id' => 330, 'home_team_id' => 11, 'away_team_id' => 18],
['id' => 331, 'home_team_id' => 14, 'away_team_id' => 19],
['id' => 332, 'home_team_id' => 8, 'away_team_id' => 16],
['id' => 333, 'home_team_id' => 13, 'away_team_id' => 9],
['id' => 334, 'home_team_id' => 15, 'away_team_id' => 12],
['id' => 335, 'home_team_id' => 2, 'away_team_id' => 20],
['id' => 336, 'home_team_id' => 7, 'away_team_id' => 4],
['id' => 337, 'home_team_id' => 5, 'away_team_id' => 10],
['id' => 338, 'home_team_id' => 3, 'away_team_id' => 1],
['id' => 339, 'home_team_id' => 6, 'away_team_id' => 11],
['id' => 340, 'home_team_id' => 18, 'away_team_id' => 17],
['id' => 341, 'home_team_id' => 14, 'away_team_id' => 5],
['id' => 342, 'home_team_id' => 19, 'away_team_id' => 4],
['id' => 343, 'home_team_id' => 9, 'away_team_id' => 20],
['id' => 344, 'home_team_id' => 10, 'away_team_id' => 7],
['id' => 345, 'home_team_id' => 8, 'away_team_id' => 3],
['id' => 346, 'home_team_id' => 17, 'away_team_id' => 1],
['id' => 347, 'home_team_id' => 15, 'away_team_id' => 2],
['id' => 348, 'home_team_id' => 12, 'away_team_id' => 11],
['id' => 349, 'home_team_id' => 13, 'away_team_id' => 6],
['id' => 350, 'home_team_id' => 16, 'away_team_id' => 18],
['id' => 351, 'home_team_id' => 4, 'away_team_id' => 9],
['id' => 352, 'home_team_id' => 20, 'away_team_id' => 17],
['id' => 353, 'home_team_id' => 7, 'away_team_id' => 14],
['id' => 354, 'home_team_id' => 5, 'away_team_id' => 15],
['id' => 355, 'home_team_id' => 3, 'away_team_id' => 19],
['id' => 356, 'home_team_id' => 2, 'away_team_id' => 13],
['id' => 357, 'home_team_id' => 1, 'away_team_id' => 12],
['id' => 358, 'home_team_id' => 18, 'away_team_id' => 10],
['id' => 359, 'home_team_id' => 11, 'away_team_id' => 16],
['id' => 360, 'home_team_id' => 6, 'away_team_id' => 8],
['id' => 361, 'home_team_id' => 19, 'away_team_id' => 11],
['id' => 362, 'home_team_id' => 13, 'away_team_id' => 1],
['id' => 363, 'home_team_id' => 9, 'away_team_id' => 7],
['id' => 364, 'home_team_id' => 12, 'away_team_id' => 18],
['id' => 365, 'home_team_id' => 17, 'away_team_id' => 4],
['id' => 366, 'home_team_id' => 10, 'away_team_id' => 20],
['id' => 367, 'home_team_id' => 8, 'away_team_id' => 2],
['id' => 368, 'home_team_id' => 15, 'away_team_id' => 6],
['id' => 369, 'home_team_id' => 16, 'away_team_id' => 5],
['id' => 370, 'home_team_id' => 14, 'away_team_id' => 3],
['id' => 371, 'home_team_id' => 3, 'away_team_id' => 10],
['id' => 372, 'home_team_id' => 4, 'away_team_id' => 14],
['id' => 373, 'home_team_id' => 20, 'away_team_id' => 12],
['id' => 374, 'home_team_id' => 6, 'away_team_id' => 16],
['id' => 375, 'home_team_id' => 1, 'away_team_id' => 19],
['id' => 376, 'home_team_id' => 2, 'away_team_id' => 9],
['id' => 377, 'home_team_id' => 18, 'away_team_id' => 13],
['id' => 378, 'home_team_id' => 7, 'away_team_id' => 8],
['id' => 379, 'home_team_id' => 11, 'away_team_id' => 15],
['id' => 380, 'home_team_id' => 5, 'away_team_id' => 17],
];

$results = array(
    array('id'=>"1", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"2", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"3", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"4", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"5", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"6", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"7", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"8", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"9", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"10", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"11", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"12", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"13", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"14", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"15", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"16", 'home_team_score'=>"4", 'away_team_score'=>"0"),
    array('id'=>"17", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"18", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"19", 'home_team_score'=>"2", 'away_team_score'=>"6"),
    array('id'=>"20", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"21", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"22", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"23", 'home_team_score'=>"2", 'away_team_score'=>"3"),
    array('id'=>"24", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"25", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"26", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"27", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"28", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"29", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"30", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"31", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"32", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"33", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"34", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"35", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"36", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"37", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"38", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"39", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"40", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"41", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"42", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"43", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"44", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"45", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"46", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"47", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"48", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"49", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"50", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"51", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"52", 'home_team_score'=>"4", 'away_team_score'=>"2"),
    array('id'=>"53", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"54", 'home_team_score'=>"4", 'away_team_score'=>"2"),
    array('id'=>"55", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"56", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"57", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"58", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"59", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"60", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"61", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"62", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"63", 'home_team_score'=>"5", 'away_team_score'=>"3"),
    array('id'=>"64", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"65", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"66", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"67", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"68", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"69", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"70", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"71", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"72", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"73", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"74", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"75", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"76", 'home_team_score'=>"2", 'away_team_score'=>"3"),
    array('id'=>"77", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"78", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"79", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"80", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"81", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"82", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"83", 'home_team_score'=>"4", 'away_team_score'=>"3"),
    array('id'=>"84", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"85", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"86", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"87", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"88", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"89", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"90", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"91", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"92", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"93", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"94", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"95", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"96", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"97", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"98", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"99", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"100", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"101", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"102", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"103", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"104", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"105", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"106", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"107", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"108", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"109", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"110", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"111", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"112", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"113", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"114", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"115", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"116", 'home_team_score'=>"1", 'away_team_score'=>"4"),
    array('id'=>"117", 'home_team_score'=>"0", 'away_team_score'=>"4"),
    array('id'=>"118", 'home_team_score'=>"2", 'away_team_score'=>"3"),
    array('id'=>"119", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"120", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"121", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"122", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"123", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"124", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"125", 'home_team_score'=>"2", 'away_team_score'=>"4"),
    array('id'=>"126", 'home_team_score'=>"2", 'away_team_score'=>"5"),
    array('id'=>"127", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"128", 'home_team_score'=>"4", 'away_team_score'=>"0"),
    array('id'=>"129", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"130", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"131", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"132", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"133", 'home_team_score'=>"4", 'away_team_score'=>"0"),
    array('id'=>"134", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"135", 'home_team_score'=>"3", 'away_team_score'=>"3"),
    array('id'=>"136", 'home_team_score'=>"1", 'away_team_score'=>"5"),
    array('id'=>"137", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"138", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"139", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"140", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"141", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"142", 'home_team_score'=>"4", 'away_team_score'=>"2"),
    array('id'=>"143", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"144", 'home_team_score'=>"2", 'away_team_score'=>"3"),
    array('id'=>"145", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"146", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"147", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"148", 'home_team_score'=>"3", 'away_team_score'=>"4"),
    array('id'=>"149", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"150", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"151", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"152", 'home_team_score'=>"4", 'away_team_score'=>"0"),
    array('id'=>"153", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"154", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"155", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"156", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"157", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"158", 'home_team_score'=>"0", 'away_team_score'=>"5"),
    array('id'=>"159", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"160", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"161", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"162", 'home_team_score'=>"0", 'away_team_score'=>"4"),
    array('id'=>"163", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"164", 'home_team_score'=>"1", 'away_team_score'=>"5"),
    array('id'=>"165", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"166", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"167", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"168", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"169", 'home_team_score'=>"3", 'away_team_score'=>"6"),
    array('id'=>"170", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"171", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"172", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"173", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"174", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"175", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"176", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"177", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"178", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"179", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"180", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"181", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"182", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"183", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"184", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"185", 'home_team_score'=>"0", 'away_team_score'=>"5"),
    array('id'=>"186", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"187", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"188", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"189", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"190", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"191", 'home_team_score'=>"0", 'away_team_score'=>"5"),
    array('id'=>"192", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"193", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"194", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"195", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"196", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"197", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"198", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"199", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"200", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"201", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"202", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"203", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"204", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"205", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"206", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"207", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"208", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"209", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"210", 'home_team_score'=>"1", 'away_team_score'=>"4"),
    array('id'=>"211", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"212", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"213", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"214", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"215", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"216", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"217", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"218", 'home_team_score'=>"0", 'away_team_score'=>"6"),
    array('id'=>"219", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"220", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"221", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"222", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"223", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"224", 'home_team_score'=>"5", 'away_team_score'=>"0"),
    array('id'=>"225", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"226", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"227", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"228", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"229", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"230", 'home_team_score'=>"7", 'away_team_score'=>"0"),
    array('id'=>"231", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"232", 'home_team_score'=>"4", 'away_team_score'=>"0"),
    array('id'=>"233", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"234", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"235", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"236", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"237", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"238", 'home_team_score'=>"5", 'away_team_score'=>"1"),
    array('id'=>"239", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"240", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"241", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"242", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"243", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"244", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"245", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"246", 'home_team_score'=>"4", 'away_team_score'=>"0"),
    array('id'=>"247", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"248", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"249", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"250", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"251", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"252", 'home_team_score'=>"0", 'away_team_score'=>"4"),
    array('id'=>"253", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"254", 'home_team_score'=>"1", 'away_team_score'=>"4"),
    array('id'=>"255", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"256", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"257", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"258", 'home_team_score'=>"0", 'away_team_score'=>"4"),
    array('id'=>"259", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"260", 'home_team_score'=>"4", 'away_team_score'=>"3"),
    array('id'=>"261", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"262", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"263", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"264", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"265", 'home_team_score'=>"4", 'away_team_score'=>"0"),
    array('id'=>"266", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"267", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"268", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"269", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"270", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"271", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"272", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"273", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"274", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"275", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"276", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"277", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"278", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"279", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"280", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"281", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"282", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"283", 'home_team_score'=>"2", 'away_team_score'=>"4"),
    array('id'=>"284", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"285", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"286", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"287", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"288", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"289", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"290", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"291", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"292", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"293", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"294", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"295", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"296", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"297", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"298", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"299", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"300", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"301", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"302", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"303", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"304", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"305", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"306", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"307", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"308", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"309", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"310", 'home_team_score'=>"5", 'away_team_score'=>"2"),
    array('id'=>"311", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"312", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"313", 'home_team_score'=>"0", 'away_team_score'=>"3"),
    array('id'=>"314", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"315", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"316", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"317", 'home_team_score'=>"4", 'away_team_score'=>"2"),
    array('id'=>"318", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"319", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"320", 'home_team_score'=>"5", 'away_team_score'=>"0"),
    array('id'=>"321", 'home_team_score'=>"4", 'away_team_score'=>"2"),
    array('id'=>"322", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"323", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"324", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"325", 'home_team_score'=>"4", 'away_team_score'=>"1"),
    array('id'=>"326", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"327", 'home_team_score'=>"0", 'away_team_score'=>"4"),
    array('id'=>"328", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"329", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"330", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"331", 'home_team_score'=>"2", 'away_team_score'=>"1"),
    array('id'=>"332", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"333", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"334", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"335", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"336", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"337", 'home_team_score'=>"3", 'away_team_score'=>"0"),
    array('id'=>"338", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"339", 'home_team_score'=>"5", 'away_team_score'=>"1"),
    array('id'=>"340", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"341", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"342", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"343", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"344", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"345", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"346", 'home_team_score'=>"4", 'away_team_score'=>"3"),
    array('id'=>"347", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"348", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"349", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"350", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"351", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"352", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"353", 'home_team_score'=>"0", 'away_team_score'=>"0"),
    array('id'=>"354", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"355", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"356", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"357", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"358", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"359", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"360", 'home_team_score'=>"2", 'away_team_score'=>"2"),
    array('id'=>"361", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"362", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"363", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"364", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"365", 'home_team_score'=>"2", 'away_team_score'=>"3"),
    array('id'=>"366", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"367", 'home_team_score'=>"1", 'away_team_score'=>"0"),
    array('id'=>"368", 'home_team_score'=>"3", 'away_team_score'=>"2"),
    array('id'=>"369", 'home_team_score'=>"4", 'away_team_score'=>"2"),
    array('id'=>"370", 'home_team_score'=>"3", 'away_team_score'=>"1"),
    array('id'=>"371", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"372", 'home_team_score'=>"0", 'away_team_score'=>"2"),
    array('id'=>"373", 'home_team_score'=>"1", 'away_team_score'=>"3"),
    array('id'=>"374", 'home_team_score'=>"1", 'away_team_score'=>"1"),
    array('id'=>"375", 'home_team_score'=>"2", 'away_team_score'=>"0"),
    array('id'=>"376", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"377", 'home_team_score'=>"0", 'away_team_score'=>"1"),
    array('id'=>"378", 'home_team_score'=>"1", 'away_team_score'=>"2"),
    array('id'=>"379", 'home_team_score'=>"1", 'away_team_score'=>"4"),
    array('id'=>"380", 'home_team_score'=>"1", 'away_team_score'=>"1")
);


foreach ($results as $result) {
    $fix = App\Models\Fixture::findOrFail($result['id']);
    
    $fix->update([
        'home_team_score' => $result['home_team_score'], 
        'away_team_score' => $result['away_team_score']
    ]);
}

});


Route::get('/json', function() {

$array = array (
  0 => 
  array (
    0 => 
    array (
      'team' => 
      array (
        'id' => 33,
        'name' => 'Manchester United',
        'code' => 'MUN',
        'country' => 'England',
        'founded' => 1878,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/33.png',
      ),
      'venue' => 
      array (
        'id' => 556,
        'name' => 'Old Trafford',
        'address' => 'Sir Matt Busby Way',
        'city' => 'Manchester',
        'capacity' => 76212,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/556.png',
      ),
    ),
    1 => 
    array (
      'team' => 
      array (
        'id' => 34,
        'name' => 'Newcastle',
        'code' => 'NEW',
        'country' => 'England',
        'founded' => 1892,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/34.png',
      ),
      'venue' => 
      array (
        'id' => 562,
        'name' => 'St. James\' Park',
        'address' => 'St. James&apos; Street',
        'city' => 'Newcastle upon Tyne',
        'capacity' => 52758,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/562.png',
      ),
    ),
    2 => 
    array (
      'team' => 
      array (
        'id' => 35,
        'name' => 'Bournemouth',
        'code' => 'BOU',
        'country' => 'England',
        'founded' => 1899,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/35.png',
      ),
      'venue' => 
      array (
        'id' => 504,
        'name' => 'Vitality Stadium',
        'address' => 'Dean Court, Kings Park',
        'city' => 'Bournemouth, Dorset',
        'capacity' => 12000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/504.png',
      ),
    ),
    3 => 
    array (
      'team' => 
      array (
        'id' => 36,
        'name' => 'Fulham',
        'code' => 'FUL',
        'country' => 'England',
        'founded' => 1879,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/36.png',
      ),
      'venue' => 
      array (
        'id' => 535,
        'name' => 'Craven Cottage',
        'address' => 'Stevenage Road',
        'city' => 'London',
        'capacity' => 29589,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/535.png',
      ),
    ),
    4 => 
    array (
      'team' => 
      array (
        'id' => 39,
        'name' => 'Wolves',
        'code' => 'WOL',
        'country' => 'England',
        'founded' => 1877,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/39.png',
      ),
      'venue' => 
      array (
        'id' => 600,
        'name' => 'Molineux Stadium',
        'address' => 'Waterloo Road',
        'city' => 'Wolverhampton, West Midlands',
        'capacity' => 34624,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/600.png',
      ),
    ),
    5 => 
    array (
      'team' => 
      array (
        'id' => 40,
        'name' => 'Liverpool',
        'code' => 'LIV',
        'country' => 'England',
        'founded' => 1892,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/40.png',
      ),
      'venue' => 
      array (
        'id' => 550,
        'name' => 'Anfield',
        'address' => 'Anfield Road',
        'city' => 'Liverpool',
        'capacity' => 61276,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/550.png',
      ),
    ),
    6 => 
    array (
      'team' => 
      array (
        'id' => 41,
        'name' => 'Southampton',
        'code' => 'SOU',
        'country' => 'England',
        'founded' => 1885,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/41.png',
      ),
      'venue' => 
      array (
        'id' => 585,
        'name' => 'St. Mary\'s Stadium',
        'address' => 'Britannia Road',
        'city' => 'Southampton, Hampshire',
        'capacity' => 32689,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/585.png',
      ),
    ),
    7 => 
    array (
      'team' => 
      array (
        'id' => 42,
        'name' => 'Arsenal',
        'code' => 'ARS',
        'country' => 'England',
        'founded' => 1886,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/42.png',
      ),
      'venue' => 
      array (
        'id' => 494,
        'name' => 'Emirates Stadium',
        'address' => 'Hornsey Road',
        'city' => 'London',
        'capacity' => 60383,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/494.png',
      ),
    ),
    8 => 
    array (
      'team' => 
      array (
        'id' => 45,
        'name' => 'Everton',
        'code' => 'EVE',
        'country' => 'England',
        'founded' => 1878,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/45.png',
      ),
      'venue' => 
      array (
        'id' => 22033,
        'name' => 'Hill Dickinson Stadium',
        'address' => '35 Regent Road, Bramley-Moore Dock, Vauxhall',
        'city' => 'Liverpool, Merseyside',
        'capacity' => 52888,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/22033.png',
      ),
    ),
    9 => 
    array (
      'team' => 
      array (
        'id' => 46,
        'name' => 'Leicester',
        'code' => 'LEI',
        'country' => 'England',
        'founded' => 1884,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/46.png',
      ),
      'venue' => 
      array (
        'id' => 547,
        'name' => 'King Power Stadium',
        'address' => 'Filbert Way',
        'city' => 'Leicester, Leicestershire',
        'capacity' => 34310,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/547.png',
      ),
    ),
    10 => 
    array (
      'team' => 
      array (
        'id' => 47,
        'name' => 'Tottenham',
        'code' => 'TOT',
        'country' => 'England',
        'founded' => 1882,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/47.png',
      ),
      'venue' => 
      array (
        'id' => 593,
        'name' => 'Tottenham Hotspur Stadium',
        'address' => 'Bill Nicholson Way, 748 High Road',
        'city' => 'London',
        'capacity' => 62850,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/593.png',
      ),
    ),
    11 => 
    array (
      'team' => 
      array (
        'id' => 48,
        'name' => 'West Ham',
        'code' => 'WES',
        'country' => 'England',
        'founded' => 1895,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/48.png',
      ),
      'venue' => 
      array (
        'id' => 598,
        'name' => 'London Stadium',
        'address' => 'Marshgate Lane, Stratford',
        'city' => 'London',
        'capacity' => 64472,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/598.png',
      ),
    ),
    12 => 
    array (
      'team' => 
      array (
        'id' => 49,
        'name' => 'Chelsea',
        'code' => 'CHE',
        'country' => 'England',
        'founded' => 1905,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/49.png',
      ),
      'venue' => 
      array (
        'id' => 519,
        'name' => 'Stamford Bridge',
        'address' => 'Fulham Road',
        'city' => 'London',
        'capacity' => 41841,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/519.png',
      ),
    ),
    13 => 
    array (
      'team' => 
      array (
        'id' => 50,
        'name' => 'Manchester City',
        'code' => 'MAC',
        'country' => 'England',
        'founded' => 1880,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/50.png',
      ),
      'venue' => 
      array (
        'id' => 555,
        'name' => 'Etihad Stadium',
        'address' => 'Rowsley Street',
        'city' => 'Manchester',
        'capacity' => 55097,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/555.png',
      ),
    ),
    14 => 
    array (
      'team' => 
      array (
        'id' => 51,
        'name' => 'Brighton',
        'code' => 'BRI',
        'country' => 'England',
        'founded' => 1901,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/51.png',
      ),
      'venue' => 
      array (
        'id' => 508,
        'name' => 'American Express Stadium',
        'address' => 'Village Way',
        'city' => 'Falmer, East Sussex',
        'capacity' => 31872,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/508.png',
      ),
    ),
    15 => 
    array (
      'team' => 
      array (
        'id' => 52,
        'name' => 'Crystal Palace',
        'code' => 'CRY',
        'country' => 'England',
        'founded' => 1861,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/52.png',
      ),
      'venue' => 
      array (
        'id' => 525,
        'name' => 'Selhurst Park',
        'address' => 'Holmesdale Road',
        'city' => 'London',
        'capacity' => 26309,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/525.png',
      ),
    ),
    16 => 
    array (
      'team' => 
      array (
        'id' => 55,
        'name' => 'Brentford',
        'code' => 'BRE',
        'country' => 'England',
        'founded' => 1889,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/55.png',
      ),
      'venue' => 
      array (
        'id' => 10503,
        'name' => 'Gtech Community Stadium',
        'address' => '166 Lionel Rd N, Brentford',
        'city' => 'Brentford, Middlesex',
        'capacity' => 17250,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/10503.png',
      ),
    ),
    17 => 
    array (
      'team' => 
      array (
        'id' => 57,
        'name' => 'Ipswich',
        'code' => 'IPS',
        'country' => 'England',
        'founded' => 1878,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/57.png',
      ),
      'venue' => 
      array (
        'id' => 545,
        'name' => 'Portman Road',
        'address' => 'Portman Road',
        'city' => 'Ipswich, Suffolk',
        'capacity' => 30311,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/545.png',
      ),
    ),
    18 => 
    array (
      'team' => 
      array (
        'id' => 65,
        'name' => 'Nottingham Forest',
        'code' => 'NOT',
        'country' => 'England',
        'founded' => 1865,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/65.png',
      ),
      'venue' => 
      array (
        'id' => 566,
        'name' => 'The City Ground',
        'address' => 'Pavilion Road',
        'city' => 'Nottingham, Nottinghamshire',
        'capacity' => 30576,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/566.png',
      ),
    ),
    19 => 
    array (
      'team' => 
      array (
        'id' => 66,
        'name' => 'Aston Villa',
        'code' => 'AST',
        'country' => 'England',
        'founded' => 1874,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/66.png',
      ),
      'venue' => 
      array (
        'id' => 495,
        'name' => 'Villa Park',
        'address' => 'Trinity Road',
        'city' => 'Birmingham',
        'capacity' => 42824,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/495.png',
      ),
    ),
  ),
  1 => 
  array (
    0 => 
    array (
      'team' => 
      array (
        'id' => 529,
        'name' => 'Barcelona',
        'code' => 'BAR',
        'country' => 'Spain',
        'founded' => 1899,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/529.png',
      ),
      'venue' => 
      array (
        'id' => 19939,
        'name' => 'Estadi Olímpic Lluís Companys',
        'address' => 'Carrer de l&apos;Estadi',
        'city' => 'Barcelona',
        'capacity' => 55926,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/19939.png',
      ),
    ),
    1 => 
    array (
      'team' => 
      array (
        'id' => 530,
        'name' => 'Atletico Madrid',
        'code' => 'MAD',
        'country' => 'Spain',
        'founded' => 1903,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/530.png',
      ),
      'venue' => 
      array (
        'id' => 19217,
        'name' => 'Estádio Cívitas Metropolitano',
        'address' => 'Rosas',
        'city' => 'Madrid',
        'capacity' => 70460,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/19217.png',
      ),
    ),
    2 => 
    array (
      'team' => 
      array (
        'id' => 531,
        'name' => 'Athletic Club',
        'code' => 'BIL',
        'country' => 'Spain',
        'founded' => 1898,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/531.png',
      ),
      'venue' => 
      array (
        'id' => 1460,
        'name' => 'San Mamés Barria',
        'address' => 'Rafael Moreno Pitxitxi Kalea',
        'city' => 'Bilbao',
        'capacity' => 53289,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1460.png',
      ),
    ),
    3 => 
    array (
      'team' => 
      array (
        'id' => 532,
        'name' => 'Valencia',
        'code' => 'VAL',
        'country' => 'Spain',
        'founded' => 1919,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/532.png',
      ),
      'venue' => 
      array (
        'id' => 1497,
        'name' => 'Estadio de Mestalla',
        'address' => 'Avenida de Suecia',
        'city' => 'Valencia',
        'capacity' => 55000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1497.png',
      ),
    ),
    4 => 
    array (
      'team' => 
      array (
        'id' => 533,
        'name' => 'Villarreal',
        'code' => 'VIL',
        'country' => 'Spain',
        'founded' => 1923,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/533.png',
      ),
      'venue' => 
      array (
        'id' => 1498,
        'name' => 'Estadio de la Cerámica',
        'address' => 'Plaza Labrador',
        'city' => 'Villarreal',
        'capacity' => 24500,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1498.png',
      ),
    ),
    5 => 
    array (
      'team' => 
      array (
        'id' => 534,
        'name' => 'Las Palmas',
        'code' => 'PAL',
        'country' => 'Spain',
        'founded' => 1949,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/534.png',
      ),
      'venue' => 
      array (
        'id' => 1481,
        'name' => 'Estadio de Gran Canaria',
        'address' => 'Avenida Pío XII 29',
        'city' => 'Las Palmas de Gran Canaria',
        'capacity' => 32392,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1481.png',
      ),
    ),
    6 => 
    array (
      'team' => 
      array (
        'id' => 536,
        'name' => 'Sevilla',
        'code' => 'SEV',
        'country' => 'Spain',
        'founded' => 1890,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/536.png',
      ),
      'venue' => 
      array (
        'id' => 1494,
        'name' => 'Estadio Ramón Sánchez Pizjuán',
        'address' => 'Avenida de Eduardo Dato',
        'city' => 'Sevilla',
        'capacity' => 48649,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1494.png',
      ),
    ),
    7 => 
    array (
      'team' => 
      array (
        'id' => 537,
        'name' => 'Leganes',
        'code' => 'LEG',
        'country' => 'Spain',
        'founded' => 1928,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/537.png',
      ),
      'venue' => 
      array (
        'id' => 1464,
        'name' => 'Estadio Municipal de Butarque',
        'address' => 'Calle Arquitectura',
        'city' => 'Leganés',
        'capacity' => 12450,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1464.png',
      ),
    ),
    8 => 
    array (
      'team' => 
      array (
        'id' => 538,
        'name' => 'Celta Vigo',
        'code' => 'CEL',
        'country' => 'Spain',
        'founded' => 1923,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/538.png',
      ),
      'venue' => 
      array (
        'id' => 1467,
        'name' => 'Abanca-Balaídos',
        'address' => 'Avenida de Balaídos',
        'city' => 'Vigo',
        'capacity' => 31800,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1467.png',
      ),
    ),
    9 => 
    array (
      'team' => 
      array (
        'id' => 540,
        'name' => 'Espanyol',
        'code' => 'ESP',
        'country' => 'Spain',
        'founded' => 1900,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/540.png',
      ),
      'venue' => 
      array (
        'id' => 20421,
        'name' => 'Stage Front Stadium',
        'address' => 'Avenida Baix Llobregat 100',
        'city' => 'Cornella de Llobregat',
        'capacity' => 40423,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20421.png',
      ),
    ),
    10 => 
    array (
      'team' => 
      array (
        'id' => 541,
        'name' => 'Real Madrid',
        'code' => 'REA',
        'country' => 'Spain',
        'founded' => 1902,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/541.png',
      ),
      'venue' => 
      array (
        'id' => 1456,
        'name' => 'Estadio Santiago Bernabéu',
        'address' => 'Avenida de Concha Espina 1, Chamartín',
        'city' => 'Madrid',
        'capacity' => 85454,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1456.png',
      ),
    ),
    11 => 
    array (
      'team' => 
      array (
        'id' => 542,
        'name' => 'Alaves',
        'code' => 'ALA',
        'country' => 'Spain',
        'founded' => 1921,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/542.png',
      ),
      'venue' => 
      array (
        'id' => 1470,
        'name' => 'Estadio de Mendizorroza',
        'address' => 'Paseo de Cervantes',
        'city' => 'Vitoria-Gasteiz',
        'capacity' => 19840,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1470.png',
      ),
    ),
    12 => 
    array (
      'team' => 
      array (
        'id' => 543,
        'name' => 'Real Betis',
        'code' => 'BET',
        'country' => 'Spain',
        'founded' => 1907,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/543.png',
      ),
      'venue' => 
      array (
        'id' => 1489,
        'name' => 'Estadio Benito Villamarín',
        'address' => 'Avenida de Heliópolis',
        'city' => 'Sevilla',
        'capacity' => 60721,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1489.png',
      ),
    ),
    13 => 
    array (
      'team' => 
      array (
        'id' => 546,
        'name' => 'Getafe',
        'code' => 'GET',
        'country' => 'Spain',
        'founded' => 1983,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/546.png',
      ),
      'venue' => 
      array (
        'id' => 20422,
        'name' => 'Estadio Coliseum',
        'address' => 'Avenida de Teresa de Calcuta',
        'city' => 'Getafe',
        'capacity' => 17393,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20422.png',
      ),
    ),
    14 => 
    array (
      'team' => 
      array (
        'id' => 547,
        'name' => 'Girona',
        'code' => 'GIR',
        'country' => 'Spain',
        'founded' => 1930,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/547.png',
      ),
      'venue' => 
      array (
        'id' => 1478,
        'name' => 'Estadi Municipal de Montilivi',
        'address' => 'Avenida Montlivi 141',
        'city' => 'Girona',
        'capacity' => 14500,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1478.png',
      ),
    ),
    15 => 
    array (
      'team' => 
      array (
        'id' => 548,
        'name' => 'Real Sociedad',
        'code' => 'RSO',
        'country' => 'Spain',
        'founded' => 1909,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/548.png',
      ),
      'venue' => 
      array (
        'id' => 1491,
        'name' => 'Reale Arena',
        'address' => 'Paseo de Anoeta 1',
        'city' => 'Donostia-San Sebastián',
        'capacity' => 40000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1491.png',
      ),
    ),
    16 => 
    array (
      'team' => 
      array (
        'id' => 720,
        'name' => 'Valladolid',
        'code' => 'VAL',
        'country' => 'Spain',
        'founded' => 1928,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/720.png',
      ),
      'venue' => 
      array (
        'id' => 1492,
        'name' => 'Estadio Municipal José Zorrilla',
        'address' => 'Avenida del Mundial 82',
        'city' => 'Valladolid',
        'capacity' => 26512,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1492.png',
      ),
    ),
    17 => 
    array (
      'team' => 
      array (
        'id' => 727,
        'name' => 'Osasuna',
        'code' => 'OSA',
        'country' => 'Spain',
        'founded' => 1920,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/727.png',
      ),
      'venue' => 
      array (
        'id' => 1486,
        'name' => 'Estadio El Sadar',
        'address' => 'Carretera El Sadar',
        'city' => 'Iruñea',
        'capacity' => 23576,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1486.png',
      ),
    ),
    18 => 
    array (
      'team' => 
      array (
        'id' => 728,
        'name' => 'Rayo Vallecano',
        'code' => 'RAY',
        'country' => 'Spain',
        'founded' => 1924,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/728.png',
      ),
      'venue' => 
      array (
        'id' => 1488,
        'name' => 'Estadio de Vallecas',
        'address' => 'Calle Payaso Fofó',
        'city' => 'Madrid',
        'capacity' => 15500,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/1488.png',
      ),
    ),
    19 => 
    array (
      'team' => 
      array (
        'id' => 798,
        'name' => 'Mallorca',
        'code' => 'MAL',
        'country' => 'Spain',
        'founded' => 1916,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/798.png',
      ),
      'venue' => 
      array (
        'id' => 19940,
        'name' => 'Estadi Mallorca Son Moix',
        'address' => 'Camí dels Reis',
        'city' => 'Palma de Mallorca',
        'capacity' => 23142,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/19940.png',
      ),
    ),
  ),
  2 => 
  array (
    0 => 
    array (
      'team' => 
      array (
        'id' => 157,
        'name' => 'Bayern München',
        'code' => 'BAY',
        'country' => 'Germany',
        'founded' => 1900,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/157.png',
      ),
      'venue' => 
      array (
        'id' => 20732,
        'name' => 'Fußball Arena München',
        'address' => 'Werner-Heisenberg-Allee 25',
        'city' => 'München',
        'capacity' => 75024,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20732.png',
      ),
    ),
    1 => 
    array (
      'team' => 
      array (
        'id' => 160,
        'name' => 'SC Freiburg',
        'code' => 'FRE',
        'country' => 'Germany',
        'founded' => 1904,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/160.png',
      ),
      'venue' => 
      array (
        'id' => 12717,
        'name' => 'Europa-Park Stadion',
        'address' => 'Achim-Stocker-Straße 1',
        'city' => 'Freiburg im Breisgau',
        'capacity' => 34700,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/12717.png',
      ),
    ),
    2 => 
    array (
      'team' => 
      array (
        'id' => 161,
        'name' => 'VfL Wolfsburg',
        'code' => 'WOL',
        'country' => 'Germany',
        'founded' => 1945,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/161.png',
      ),
      'venue' => 
      array (
        'id' => 752,
        'name' => 'Volkswagen Arena',
        'address' => 'In den Allerwiesen 1',
        'city' => 'Wolfsburg',
        'capacity' => 30000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/752.png',
      ),
    ),
    3 => 
    array (
      'team' => 
      array (
        'id' => 162,
        'name' => 'Werder Bremen',
        'code' => 'WER',
        'country' => 'Germany',
        'founded' => 1899,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/162.png',
      ),
      'venue' => 
      array (
        'id' => 755,
        'name' => 'wohninvest WESERSTADION',
        'address' => 'Franz-Böhmert-Straße 1c',
        'city' => 'Bremen',
        'capacity' => 42358,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/755.png',
      ),
    ),
    4 => 
    array (
      'team' => 
      array (
        'id' => 163,
        'name' => 'Borussia Mönchengladbach',
        'code' => 'MOE',
        'country' => 'Germany',
        'founded' => 1900,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/163.png',
      ),
      'venue' => 
      array (
        'id' => 20471,
        'name' => 'BORUSSIA-PARK',
        'address' => 'Hennes-Weisweiler-Allee 1',
        'city' => 'Mönchengladbach',
        'capacity' => 54057,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20471.png',
      ),
    ),
    5 => 
    array (
      'team' => 
      array (
        'id' => 164,
        'name' => 'FSV Mainz 05',
        'code' => 'MAI',
        'country' => 'Germany',
        'founded' => 1905,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/164.png',
      ),
      'venue' => 
      array (
        'id' => 11899,
        'name' => 'MEWA ARENA',
        'address' => 'Eugen-Salomon-Straße 1',
        'city' => 'Mainz',
        'capacity' => 34034,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/11899.png',
      ),
    ),
    6 => 
    array (
      'team' => 
      array (
        'id' => 165,
        'name' => 'Borussia Dortmund',
        'code' => 'DOR',
        'country' => 'Germany',
        'founded' => 1909,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/165.png',
      ),
      'venue' => 
      array (
        'id' => 20733,
        'name' => 'BVB Stadion Dortmund',
        'address' => 'Strobelalle 50',
        'city' => 'Dortmund',
        'capacity' => 81365,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20733.png',
      ),
    ),
    7 => 
    array (
      'team' => 
      array (
        'id' => 167,
        'name' => '1899 Hoffenheim',
        'code' => 'HOF',
        'country' => 'Germany',
        'founded' => 1899,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/167.png',
      ),
      'venue' => 
      array (
        'id' => 724,
        'name' => 'PreZero Arena',
        'address' => 'Dietmar-Hopp-Straße 1',
        'city' => 'Sinsheim',
        'capacity' => 30164,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/724.png',
      ),
    ),
    8 => 
    array (
      'team' => 
      array (
        'id' => 168,
        'name' => 'Bayer Leverkusen',
        'code' => 'BAY',
        'country' => 'Germany',
        'founded' => 1904,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/168.png',
      ),
      'venue' => 
      array (
        'id' => 699,
        'name' => 'BayArena',
        'address' => 'Bismarckstr. 122-124',
        'city' => 'Leverkusen',
        'capacity' => 30210,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/699.png',
      ),
    ),
    9 => 
    array (
      'team' => 
      array (
        'id' => 169,
        'name' => 'Eintracht Frankfurt',
        'code' => 'EIN',
        'country' => 'Germany',
        'founded' => 1899,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/169.png',
      ),
      'venue' => 
      array (
        'id' => 20734,
        'name' => 'Frankfurt Arena',
        'address' => 'Mörfelder Landstr. 362',
        'city' => 'Frankfurt am Main',
        'capacity' => 58000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20734.png',
      ),
    ),
    10 => 
    array (
      'team' => 
      array (
        'id' => 170,
        'name' => 'FC Augsburg',
        'code' => 'AUG',
        'country' => 'Germany',
        'founded' => 1907,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/170.png',
      ),
      'venue' => 
      array (
        'id' => 698,
        'name' => 'WWK Arena',
        'address' => 'Bürgermeister Ulrich-Straße 90',
        'city' => 'Augsburg',
        'capacity' => 30662,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/698.png',
      ),
    ),
    11 => 
    array (
      'team' => 
      array (
        'id' => 172,
        'name' => 'VfB Stuttgart',
        'code' => 'STU',
        'country' => 'Germany',
        'founded' => 1893,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/172.png',
      ),
      'venue' => 
      array (
        'id' => 20739,
        'name' => 'Stuttgart Arena',
        'address' => 'Mercedesstrasse 87',
        'city' => 'Stuttgart',
        'capacity' => 60469,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20739.png',
      ),
    ),
    12 => 
    array (
      'team' => 
      array (
        'id' => 173,
        'name' => 'RB Leipzig',
        'code' => 'LEI',
        'country' => 'Germany',
        'founded' => 2009,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/173.png',
      ),
      'venue' => 
      array (
        'id' => 20737,
        'name' => 'Leipzig Stadium',
        'address' => 'Am Sportforum 3',
        'city' => 'Leipzig',
        'capacity' => 47069,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20737.png',
      ),
    ),
    13 => 
    array (
      'team' => 
      array (
        'id' => 176,
        'name' => 'VfL Bochum',
        'code' => 'BOC',
        'country' => 'Germany',
        'founded' => 1848,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/176.png',
      ),
      'venue' => 
      array (
        'id' => 751,
        'name' => 'Vonovia Ruhrstadion',
        'address' => 'Castropher Straße 145',
        'city' => 'Bochum',
        'capacity' => 27599,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/751.png',
      ),
    ),
    14 => 
    array (
      'team' => 
      array (
        'id' => 180,
        'name' => '1. FC Heidenheim',
        'code' => 'HEI',
        'country' => 'Germany',
        'founded' => 1946,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/180.png',
      ),
      'venue' => 
      array (
        'id' => 723,
        'name' => 'Voith-Arena',
        'address' => 'Schloßhaustraße 160',
        'city' => 'Heidenheim an der Brenz',
        'capacity' => 15000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/723.png',
      ),
    ),
    15 => 
    array (
      'team' => 
      array (
        'id' => 182,
        'name' => 'Union Berlin',
        'code' => 'UNI',
        'country' => 'Germany',
        'founded' => 1966,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/182.png',
      ),
      'venue' => 
      array (
        'id' => 748,
        'name' => 'Stadion An der Alten Försterei',
        'address' => 'Hämmerlingstraße 80-88, Köpenick',
        'city' => 'Berlin',
        'capacity' => 22467,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/748.png',
      ),
    ),
    16 => 
    array (
      'team' => 
      array (
        'id' => 186,
        'name' => 'FC St. Pauli',
        'code' => 'PAU',
        'country' => 'Germany',
        'founded' => 1910,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/186.png',
      ),
      'venue' => 
      array (
        'id' => 745,
        'name' => 'Millerntor-Stadion',
        'address' => 'Harald-Stender-Platz 1',
        'city' => 'Hamburg',
        'capacity' => 29564,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/745.png',
      ),
    ),
    17 => 
    array (
      'team' => 
      array (
        'id' => 191,
        'name' => 'Holstein Kiel',
        'code' => 'HOL',
        'country' => 'Germany',
        'founded' => 1900,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/191.png',
      ),
      'venue' => 
      array (
        'id' => 725,
        'name' => 'Holstein-Stadion',
        'address' => 'Westring 501',
        'city' => 'Kiel',
        'capacity' => 15034,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/725.png',
      ),
    ),
    18 => 
    array (
      'team' => 
      array (
        'id' => 1660,
        'name' => 'SV Elversberg',
        'code' => 'ELV',
        'country' => 'Germany',
        'founded' => 1907,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/1660.png',
      ),
      'venue' => 
      array (
        'id' => 710,
        'name' => 'URSAPHARM-Arena an der Kaiserlinde',
        'address' => 'Lindenstraße 7',
        'city' => 'Spiesen-Elversberg',
        'capacity' => 11150,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/710.png',
      ),
    ),
  ),
  3 => 
  array (
    0 => 
    array (
      'team' => 
      array (
        'id' => 77,
        'name' => 'Angers',
        'code' => 'ANG',
        'country' => 'France',
        'founded' => 1919,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/77.png',
      ),
      'venue' => 
      array (
        'id' => 634,
        'name' => 'Stade Raymond-Kopa',
        'address' => '73, boulevard Pierre de Coubertin',
        'city' => 'Angers',
        'capacity' => 19000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/634.png',
      ),
    ),
    1 => 
    array (
      'team' => 
      array (
        'id' => 79,
        'name' => 'Lille',
        'code' => 'LIL',
        'country' => 'France',
        'founded' => 1944,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/79.png',
      ),
      'venue' => 
      array (
        'id' => 19207,
        'name' => 'Decathlon Arena – Stade Pierre-Mauroy',
        'address' => '261, Boulevard de Tournai, l&apos;Hôtel de Ville',
        'city' => 'Villeneuve d&apos;Ascq',
        'capacity' => 50083,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/19207.png',
      ),
    ),
    2 => 
    array (
      'team' => 
      array (
        'id' => 80,
        'name' => 'Lyon',
        'code' => 'LYO',
        'country' => 'France',
        'founded' => 1950,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/80.png',
      ),
      'venue' => 
      array (
        'id' => 666,
        'name' => 'Groupama Stadium',
        'address' => 'Chemin du Montout',
        'city' => 'Décines-Charpieu',
        'capacity' => 61556,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/666.png',
      ),
    ),
    3 => 
    array (
      'team' => 
      array (
        'id' => 81,
        'name' => 'Marseille',
        'code' => 'MAR',
        'country' => 'France',
        'founded' => 1899,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/81.png',
      ),
      'venue' => 
      array (
        'id' => 12678,
        'name' => 'Stade Orange Vélodrome',
        'address' => '3, boulevard Michelet',
        'city' => 'Marseille',
        'capacity' => 67394,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/12678.png',
      ),
    ),
    4 => 
    array (
      'team' => 
      array (
        'id' => 82,
        'name' => 'Montpellier',
        'code' => 'MON',
        'country' => 'France',
        'founded' => 1974,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/82.png',
      ),
      'venue' => 
      array (
        'id' => 20107,
        'name' => 'Stade de la Mosson-Mondial 98',
        'address' => 'Avenue de Heidelberg',
        'city' => 'Montpellier',
        'capacity' => 32939,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20107.png',
      ),
    ),
    5 => 
    array (
      'team' => 
      array (
        'id' => 83,
        'name' => 'Nantes',
        'code' => 'NAN',
        'country' => 'France',
        'founded' => 1943,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/83.png',
      ),
      'venue' => 
      array (
        'id' => 662,
        'name' => 'Stade de la Beaujoire - Louis Fonteneau',
        'address' => '5, boulevard de la Beaujoire',
        'city' => 'Nantes',
        'capacity' => 38285,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/662.png',
      ),
    ),
    6 => 
    array (
      'team' => 
      array (
        'id' => 84,
        'name' => 'Nice',
        'code' => 'NIC',
        'country' => 'France',
        'founded' => 1904,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/84.png',
      ),
      'venue' => 
      array (
        'id' => 663,
        'name' => 'Allianz Riviera',
        'address' => 'Boulevard des Jardiniers',
        'city' => 'Nice',
        'capacity' => 35624,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/663.png',
      ),
    ),
    7 => 
    array (
      'team' => 
      array (
        'id' => 85,
        'name' => 'Paris Saint Germain',
        'code' => 'PAR',
        'country' => 'France',
        'founded' => 1970,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/85.png',
      ),
      'venue' => 
      array (
        'id' => 671,
        'name' => 'Parc des Princes',
        'address' => '24, rue du Commandant Guilbaud',
        'city' => 'Paris',
        'capacity' => 47929,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/671.png',
      ),
    ),
    8 => 
    array (
      'team' => 
      array (
        'id' => 91,
        'name' => 'Monaco',
        'code' => 'MON',
        'country' => 'France',
        'founded' => 1919,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/91.png',
      ),
      'venue' => 
      array (
        'id' => 20470,
        'name' => 'Stade Louis-II',
        'address' => '7, avenue des Castelans',
        'city' => 'Monaco',
        'capacity' => 18523,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20470.png',
      ),
    ),
    9 => 
    array (
      'team' => 
      array (
        'id' => 93,
        'name' => 'Reims',
        'code' => 'REI',
        'country' => 'France',
        'founded' => 1909,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/93.png',
      ),
      'venue' => 
      array (
        'id' => 674,
        'name' => 'Stade Auguste-Delaune II',
        'address' => '33, Chaussée Bocquaine',
        'city' => 'Reims',
        'capacity' => 21684,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/674.png',
      ),
    ),
    10 => 
    array (
      'team' => 
      array (
        'id' => 94,
        'name' => 'Rennes',
        'code' => 'REN',
        'country' => 'France',
        'founded' => 1901,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/94.png',
      ),
      'venue' => 
      array (
        'id' => 680,
        'name' => 'Roazhon Park',
        'address' => '111, route de Lorient',
        'city' => 'Rennes',
        'capacity' => 31127,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/680.png',
      ),
    ),
    11 => 
    array (
      'team' => 
      array (
        'id' => 95,
        'name' => 'Strasbourg',
        'code' => 'STR',
        'country' => 'France',
        'founded' => 1906,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/95.png',
      ),
      'venue' => 
      array (
        'id' => 681,
        'name' => 'Stade de la Meinau',
        'address' => '12, rue de l&apos;Extenwoerth',
        'city' => 'Strasbourg',
        'capacity' => 26109,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/681.png',
      ),
    ),
    12 => 
    array (
      'team' => 
      array (
        'id' => 96,
        'name' => 'Toulouse',
        'code' => 'TOU',
        'country' => 'France',
        'founded' => 1937,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/96.png',
      ),
      'venue' => 
      array (
        'id' => 682,
        'name' => 'Stadium de Toulouse',
        'address' => '1, allée Gabriel Biènés',
        'city' => 'Toulouse',
        'capacity' => 33150,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/682.png',
      ),
    ),
    13 => 
    array (
      'team' => 
      array (
        'id' => 106,
        'name' => 'Stade Brestois 29',
        'code' => 'BRE',
        'country' => 'France',
        'founded' => 1950,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/106.png',
      ),
      'venue' => 
      array (
        'id' => 641,
        'name' => 'Stade Francis-Le Blé',
        'address' => '26, rue de Quimper',
        'city' => 'Brest',
        'capacity' => 15931,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/641.png',
      ),
    ),
    14 => 
    array (
      'team' => 
      array (
        'id' => 108,
        'name' => 'Auxerre',
        'code' => 'AUX',
        'country' => 'France',
        'founded' => 1905,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/108.png',
      ),
      'venue' => 
      array (
        'id' => 636,
        'name' => 'Stade de l\'Abbé Deschamps',
        'address' => 'Route de Vaux',
        'city' => 'Auxerre',
        'capacity' => 23467,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/636.png',
      ),
    ),
    15 => 
    array (
      'team' => 
      array (
        'id' => 111,
        'name' => 'Le Havre',
        'code' => 'HAV',
        'country' => 'France',
        'founded' => 1872,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/111.png',
      ),
      'venue' => 
      array (
        'id' => 652,
        'name' => 'Stade Océane',
        'address' => 'Boulevard de Léningrad',
        'city' => 'Le Havre',
        'capacity' => 25178,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/652.png',
      ),
    ),
    16 => 
    array (
      'team' => 
      array (
        'id' => 112,
        'name' => 'Metz',
        'code' => 'MET',
        'country' => 'France',
        'founded' => 1932,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/112.png',
      ),
      'venue' => 
      array (
        'id' => 658,
        'name' => 'Stade Saint-Symphorien',
        'address' => '3, allée Saint-Symphorien',
        'city' => 'Longeville-lès-Metz',
        'capacity' => 30000,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/658.png',
      ),
    ),
    17 => 
    array (
      'team' => 
      array (
        'id' => 116,
        'name' => 'Lens',
        'code' => 'LEN',
        'country' => 'France',
        'founded' => 1906,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/116.png',
      ),
      'venue' => 
      array (
        'id' => 654,
        'name' => 'Stade Bollaert-Delelis',
        'address' => '83, rue Maurice-Carton',
        'city' => 'Lens',
        'capacity' => 41233,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/654.png',
      ),
    ),
    18 => 
    array (
      'team' => 
      array (
        'id' => 1063,
        'name' => 'Saint Etienne',
        'code' => 'ETI',
        'country' => 'France',
        'founded' => 1920,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/1063.png',
      ),
      'venue' => 
      array (
        'id' => 676,
        'name' => 'Stade Geoffroy-Guichard',
        'address' => '14, rue Pierre et Paul Guichard',
        'city' => 'Saint-Ètienne',
        'capacity' => 41965,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/676.png',
      ),
    ),
  ),
  4 => 
  array (
    0 => 
    array (
      'team' => 
      array (
        'id' => 487,
        'name' => 'Lazio',
        'code' => 'LAZ',
        'country' => 'Italy',
        'founded' => 1900,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/487.png',
      ),
      'venue' => 
      array (
        'id' => 910,
        'name' => 'Stadio Olimpico',
        'address' => 'Viale dei Gladiatori, 2 / Via del Foro Italico',
        'city' => 'Roma',
        'capacity' => 68530,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/910.png',
      ),
    ),
    1 => 
    array (
      'team' => 
      array (
        'id' => 489,
        'name' => 'AC Milan',
        'code' => 'MIL',
        'country' => 'Italy',
        'founded' => 1899,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/489.png',
      ),
      'venue' => 
      array (
        'id' => 907,
        'name' => 'Stadio Giuseppe Meazza',
        'address' => 'Via Piccolomini 5',
        'city' => 'Milano',
        'capacity' => 80018,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/907.png',
      ),
    ),
    2 => 
    array (
      'team' => 
      array (
        'id' => 490,
        'name' => 'Cagliari',
        'code' => 'CAG',
        'country' => 'Italy',
        'founded' => 1920,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/490.png',
      ),
      'venue' => 
      array (
        'id' => 12275,
        'name' => 'Unipol Domus',
        'address' => 'Via Raimondo Carta Raspi',
        'city' => 'Cagliari',
        'capacity' => 16416,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/12275.png',
      ),
    ),
    3 => 
    array (
      'team' => 
      array (
        'id' => 492,
        'name' => 'Napoli',
        'code' => 'NAP',
        'country' => 'Italy',
        'founded' => 1904,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/492.png',
      ),
      'venue' => 
      array (
        'id' => 11904,
        'name' => 'Stadio Diego Armando Maradona',
        'address' => 'Pizzale Vincenzo Tecchio',
        'city' => 'Napoli',
        'capacity' => 60240,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/11904.png',
      ),
    ),
    4 => 
    array (
      'team' => 
      array (
        'id' => 494,
        'name' => 'Udinese',
        'code' => 'UDI',
        'country' => 'Italy',
        'founded' => 1896,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/494.png',
      ),
      'venue' => 
      array (
        'id' => 20416,
        'name' => 'Bluenergy Stadium',
        'address' => 'Piazza le Repubblica Argentina, 3',
        'city' => 'Udine',
        'capacity' => 25952,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20416.png',
      ),
    ),
    5 => 
    array (
      'team' => 
      array (
        'id' => 495,
        'name' => 'Genoa',
        'code' => 'GEN',
        'country' => 'Italy',
        'founded' => 1893,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/495.png',
      ),
      'venue' => 
      array (
        'id' => 905,
        'name' => 'Stadio Comunale Luigi Ferraris',
        'address' => 'Via Giovanni De Prà, 1',
        'city' => 'Genova',
        'capacity' => 36703,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/905.png',
      ),
    ),
    6 => 
    array (
      'team' => 
      array (
        'id' => 496,
        'name' => 'Juventus',
        'code' => 'JUV',
        'country' => 'Italy',
        'founded' => 1897,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/496.png',
      ),
      'venue' => 
      array (
        'id' => 909,
        'name' => 'Allianz Stadium',
        'address' => 'Strada Comunale di Altessano 131',
        'city' => 'Torino',
        'capacity' => 45666,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/909.png',
      ),
    ),
    7 => 
    array (
      'team' => 
      array (
        'id' => 497,
        'name' => 'AS Roma',
        'code' => 'ROM',
        'country' => 'Italy',
        'founded' => 1927,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/497.png',
      ),
      'venue' => 
      array (
        'id' => 910,
        'name' => 'Stadio Olimpico',
        'address' => 'Viale dei Gladiatori, 2 / Via del Foro Italico',
        'city' => 'Roma',
        'capacity' => 68530,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/910.png',
      ),
    ),
    8 => 
    array (
      'team' => 
      array (
        'id' => 499,
        'name' => 'Atalanta',
        'code' => 'ATA',
        'country' => 'Italy',
        'founded' => 1907,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/499.png',
      ),
      'venue' => 
      array (
        'id' => 879,
        'name' => 'Gewiss Stadium',
        'address' => 'Viale Giulio Cesare 18',
        'city' => 'Bergamo',
        'capacity' => 21300,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/879.png',
      ),
    ),
    9 => 
    array (
      'team' => 
      array (
        'id' => 500,
        'name' => 'Bologna',
        'code' => 'BOL',
        'country' => 'Italy',
        'founded' => 1909,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/500.png',
      ),
      'venue' => 
      array (
        'id' => 881,
        'name' => 'Stadio Renato Dall\'Ara',
        'address' => 'Via Andrea Costa, 174',
        'city' => 'Bologna',
        'capacity' => 39279,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/881.png',
      ),
    ),
    10 => 
    array (
      'team' => 
      array (
        'id' => 502,
        'name' => 'Fiorentina',
        'code' => 'FIO',
        'country' => 'Italy',
        'founded' => 1926,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/502.png',
      ),
      'venue' => 
      array (
        'id' => 902,
        'name' => 'Stadio Artemio Franchi',
        'address' => 'Viale Manfredo Fanti 14',
        'city' => 'Firenze',
        'capacity' => 43147,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/902.png',
      ),
    ),
    11 => 
    array (
      'team' => 
      array (
        'id' => 503,
        'name' => 'Torino',
        'code' => 'TOR',
        'country' => 'Italy',
        'founded' => 1906,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/503.png',
      ),
      'venue' => 
      array (
        'id' => 943,
        'name' => 'Stadio Olimpico Grande Torino',
        'address' => 'Corso Sebastopoli 123, Santa Rita',
        'city' => 'Torino',
        'capacity' => 27958,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/943.png',
      ),
    ),
    12 => 
    array (
      'team' => 
      array (
        'id' => 504,
        'name' => 'Verona',
        'code' => 'VER',
        'country' => 'Italy',
        'founded' => 1903,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/504.png',
      ),
      'venue' => 
      array (
        'id' => 890,
        'name' => 'Stadio Marc\'Antonio Bentegodi',
        'address' => 'Piazzale Olimpia',
        'city' => 'Verona',
        'capacity' => 39211,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/890.png',
      ),
    ),
    13 => 
    array (
      'team' => 
      array (
        'id' => 505,
        'name' => 'Inter',
        'code' => 'INT',
        'country' => 'Italy',
        'founded' => 1908,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/505.png',
      ),
      'venue' => 
      array (
        'id' => 907,
        'name' => 'Stadio Giuseppe Meazza',
        'address' => 'Via Piccolomini 5',
        'city' => 'Milano',
        'capacity' => 80018,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/907.png',
      ),
    ),
    14 => 
    array (
      'team' => 
      array (
        'id' => 511,
        'name' => 'Empoli',
        'code' => 'EMP',
        'country' => 'Italy',
        'founded' => 1920,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/511.png',
      ),
      'venue' => 
      array (
        'id' => 20109,
        'name' => 'Stadio Carlo Castellani – Computer Gross Arena',
        'address' => 'Viale delle Olimpiadi',
        'city' => 'Empoli',
        'capacity' => 16284,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/20109.png',
      ),
    ),
    15 => 
    array (
      'team' => 
      array (
        'id' => 517,
        'name' => 'Venezia',
        'code' => 'VEN',
        'country' => 'Italy',
        'founded' => 1907,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/517.png',
      ),
      'venue' => 
      array (
        'id' => 948,
        'name' => 'Stadio Pierluigi Penzo',
        'address' => 'Isola di Sant&apos;Elena',
        'city' => 'Venezia',
        'capacity' => 11150,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/948.png',
      ),
    ),
    16 => 
    array (
      'team' => 
      array (
        'id' => 523,
        'name' => 'Parma',
        'code' => 'PAR',
        'country' => 'Italy',
        'founded' => 1913,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/523.png',
      ),
      'venue' => 
      array (
        'id' => 921,
        'name' => 'Stadio Ennio Tardini',
        'address' => 'Via Partigiani d&apos;Italia, 1',
        'city' => 'Parma',
        'capacity' => 22885,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/921.png',
      ),
    ),
    17 => 
    array (
      'team' => 
      array (
        'id' => 867,
        'name' => 'Lecce',
        'code' => 'LEC',
        'country' => 'Italy',
        'founded' => 1908,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/867.png',
      ),
      'venue' => 
      array (
        'id' => 911,
        'name' => 'Stadio Comunale Via del Mare',
        'address' => 'Viale dello Stadio',
        'city' => 'Lecce',
        'capacity' => 33876,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/911.png',
      ),
    ),
    18 => 
    array (
      'team' => 
      array (
        'id' => 895,
        'name' => 'Como',
        'code' => 'COM',
        'country' => 'Italy',
        'founded' => 1907,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/895.png',
      ),
      'venue' => 
      array (
        'id' => 892,
        'name' => 'Stadio Giuseppe Sinigaglia',
        'address' => 'Via Giuseppe Sinigaglia, 3',
        'city' => 'Como',
        'capacity' => 13602,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/892.png',
      ),
    ),
    19 => 
    array (
      'team' => 
      array (
        'id' => 1579,
        'name' => 'Monza',
        'code' => 'MON',
        'country' => 'Italy',
        'founded' => 1912,
        'national' => false,
        'logo' => 'https://media.api-sports.io/football/teams/1579.png',
      ),
      'venue' => 
      array (
        'id' => 12086,
        'name' => 'U-Power Stadium',
        'address' => 'Via Franco Tognini',
        'city' => 'Monza',
        'capacity' => 18568,
        'surface' => 'grass',
        'image' => 'https://media.api-sports.io/football/venues/12086.png',
      ),
    ),
  ),
);

echo json_encode($array);

});