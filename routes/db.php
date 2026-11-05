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

$dbs = [
    'kategoria' => KategoriaController::class,
    'pizza' => PizzaController::class,
    'rendeles' => RendelesController::class
];
foreach ($dbs as $n => $c) {
    $uri = 'db/'.$n;
    Route::get($uri, [$c, 'index']);
    Route::post($uri, [$c, 'store']);
    Route::put($uri, [$c, 'update']);
    Route::delete($uri, [$c, 'destroy']);
}

Route::get('/dbdiagram', [DiagramController::class, 'show'])->name('db_diagram');