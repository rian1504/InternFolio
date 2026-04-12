<?php

use App\Http\Controllers\InternController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\ExportCVController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// Export CV route (requires authentication)
Route::get('/export-cv', [ExportCVController::class, 'export'])
    ->middleware('auth')
    ->name('export.cv');

// Shortlink redirect route
Route::get('/s/{code}', [ShortLinkController::class, 'redirect'])->name('shortlink.redirect');

Route::prefix('interns')->group(function () {
    Route::get('', [InternController::class, 'index'])->name('intern.index');
    Route::get('{user}', [InternController::class, 'show'])->name('intern.show');
});

Route::prefix('project')->group(function () {
    Route::get('', [ProjectController::class, 'index'])->name('project.index');
    Route::get('{project}', [ProjectController::class, 'show'])->name('project.show');
});

Route::prefix('suggestion')->group(function () {
    Route::get('', [SuggestionController::class, 'index'])->name('suggestion.index');
    Route::get('{suggestion}', [SuggestionController::class, 'show'])->name('suggestion.show');
});

// setup production
Route::get('/setup/{key}/{action?}', function ($key, $action = null) {
    if ($key !== env('SETUP_KEY')) {
        abort(403);
    }

    $output = [];

    try {
        if ($action === 'migrate') {
            Artisan::call('migrate', ['--force' => true]);
            $output[] = Artisan::output();
        } elseif ($action === 'seed') {
            Artisan::call('db:seed', ['--force' => true]);
            $output[] = Artisan::output();
        } elseif ($action === 'link') {
            Artisan::call('storage:link');
            $output[] = Artisan::output();
        } else {
            // Default: run all
            Artisan::call('migrate', ['--force' => true]);
            $output[] = Artisan::output();

            Artisan::call('db:seed', ['--force' => true]);
            $output[] = Artisan::output();

            Artisan::call('storage:link');
            $output[] = Artisan::output();
        }

        return nl2br(implode("\n", $output));
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});