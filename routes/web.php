<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('locations', [App\Http\Controllers\Admin\LocationController::class, 'index'])->name('locations.index');
        Route::post('locations', [App\Http\Controllers\Admin\LocationController::class, 'store'])->name('locations.store');
        Route::put('locations/{type}/{id}', [App\Http\Controllers\Admin\LocationController::class, 'update'])->name('locations.update');
        Route::delete('locations/{type}/{id}', [App\Http\Controllers\Admin\LocationController::class, 'destroy'])->name('locations.destroy');

        Route::get('positions', [App\Http\Controllers\Admin\PositionController::class, 'index'])->name('positions.index');
        Route::post('positions', [App\Http\Controllers\Admin\PositionController::class, 'store'])->name('positions.store');
        Route::put('positions/{position}', [App\Http\Controllers\Admin\PositionController::class, 'update'])->name('positions.update');
        Route::delete('positions/{position}', [App\Http\Controllers\Admin\PositionController::class, 'destroy'])->name('positions.destroy');

        Route::get('aspirants', [App\Http\Controllers\Admin\AspirantController::class, 'index'])->name('aspirants.index');
        Route::post('aspirants', [App\Http\Controllers\Admin\AspirantController::class, 'store'])->name('aspirants.store');
        Route::put('aspirants/{aspirant}', [App\Http\Controllers\Admin\AspirantController::class, 'update'])->name('aspirants.update');
        Route::delete('aspirants/{aspirant}', [App\Http\Controllers\Admin\AspirantController::class, 'destroy'])->name('aspirants.destroy');

        Route::get('polls', [App\Http\Controllers\Admin\PollController::class, 'index'])->name('polls.index');
        Route::post('polls', [App\Http\Controllers\Admin\PollController::class, 'store'])->name('polls.store');
        Route::put('polls/{poll}', [App\Http\Controllers\Admin\PollController::class, 'update'])->name('polls.update');
        Route::delete('polls/{poll}', [App\Http\Controllers\Admin\PollController::class, 'destroy'])->name('polls.destroy');
        Route::get('polls/{poll}/results', [App\Http\Controllers\Admin\PollController::class, 'results'])->name('polls.results');
    });
});

Route::get('polls', [App\Http\Controllers\Public\PollController::class, 'index'])->name('polls.index');
Route::get('polls/{poll}', [App\Http\Controllers\Public\PollController::class, 'show'])->name('polls.show');
Route::post('polls/{poll}/vote', [App\Http\Controllers\Public\VoteController::class, 'store'])->middleware('throttle:votes,10,1')->name('polls.vote');
Route::get('rankings', [App\Http\Controllers\Public\RankingController::class, 'index'])->name('rankings.index');

require __DIR__.'/settings.php';
