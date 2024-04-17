<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PlayerController::class, 'index']);
Route::get('/player/{id}', [PlayerController::class, 'show'])->name('players.show');
