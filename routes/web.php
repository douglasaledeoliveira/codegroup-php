<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;

Route::get('/', [TeamController::class, 'showSortTeamsForm'])->name('players');
Route::resource('players', PlayerController::class)->except(['show']);
Route::post('/sort-teams', [TeamController::class, 'sortTeams'])->name('teams.sort');
