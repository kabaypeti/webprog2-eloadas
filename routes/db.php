<?php

use App\Http\Controllers\Database\KategoriaController;
use App\Http\Controllers\Database\PizzaController;
use App\Http\Controllers\Database\RendelesController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\GenericDbController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use App\Http\Middleware\ExistingDbCheck;

Route::get('/db', function() { return view('db_select'); })->name('db.select');

Route::middleware([])->group(function() {
    Route::apiResource('db/kategoria', KategoriaController::class);
    Route::apiResource('db/pizza', PizzaController::class);
    Route::apiResource('db/rendeles', RendelesController::class);
});

Route::get('/dbdiagram', [DiagramController::class, 'show'])->name('db_diagram');