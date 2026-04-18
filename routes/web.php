<?php

use App\Http\Controllers\Admin\AspirantController;
use App\Http\Controllers\Admin\ConstituencyController;
use App\Http\Controllers\Admin\CountyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\WardController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\PollController as PublicPollController;
use App\Http\Controllers\Public\RankingController;
use App\Http\Controllers\Public\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::redirect('/contacts', '/contact', 301)->name('contacts');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('counties', [CountyController::class, 'index'])->name('counties.index');
        Route::post('counties', [CountyController::class, 'store'])->name('counties.store');
        Route::put('counties/{county}', [CountyController::class, 'update'])->name('counties.update');
        Route::delete('counties/{county}', [CountyController::class, 'destroy'])->name('counties.destroy');

        Route::get('constituencies', [ConstituencyController::class, 'index'])->name('constituencies.index');
        Route::post('constituencies', [ConstituencyController::class, 'store'])->name('constituencies.store');
        Route::put('constituencies/{constituency}', [ConstituencyController::class, 'update'])->name('constituencies.update');
        Route::delete('constituencies/{constituency}', [ConstituencyController::class, 'destroy'])->name('constituencies.destroy');

        Route::get('wards', [WardController::class, 'index'])->name('wards.index');
        Route::post('wards', [WardController::class, 'store'])->name('wards.store');
        Route::put('wards/{ward}', [WardController::class, 'update'])->name('wards.update');
        Route::delete('wards/{ward}', [WardController::class, 'destroy'])->name('wards.destroy');

        Route::get('positions', [PositionController::class, 'index'])->name('positions.index');
        Route::post('positions', [PositionController::class, 'store'])->name('positions.store');
        Route::put('positions/{position}', [PositionController::class, 'update'])->name('positions.update');
        Route::delete('positions/{position}', [PositionController::class, 'destroy'])->name('positions.destroy');

        Route::get('aspirants', [AspirantController::class, 'index'])->name('aspirants.index');
        Route::post('aspirants', [AspirantController::class, 'store'])->name('aspirants.store');
        Route::put('aspirants/{aspirant}', [AspirantController::class, 'update'])->name('aspirants.update');
        Route::delete('aspirants/{aspirant}', [AspirantController::class, 'destroy'])->name('aspirants.destroy');

        Route::get('polls', [PollController::class, 'index'])->name('polls.index');
        Route::post('polls', [PollController::class, 'store'])->name('polls.store');
        Route::put('polls/{poll}', [PollController::class, 'update'])->name('polls.update');
        Route::delete('polls/{poll}', [PollController::class, 'destroy'])->name('polls.destroy');
        Route::get('polls/{poll}/results', [PollController::class, 'results'])->name('polls.results');
    });
});

Route::get('polls', [PublicPollController::class, 'index'])->name('polls.index');
Route::get('polls/{poll}', [PublicPollController::class, 'show'])->name('polls.show');
Route::post('polls/{poll}/vote', [VoteController::class, 'store'])->middleware('throttle:votes,10,1')->name('polls.vote');
Route::get('rankings', [RankingController::class, 'index'])->name('rankings.index');

require __DIR__.'/settings.php';
