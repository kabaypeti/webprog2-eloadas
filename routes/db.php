<?php

use App\Http\Controllers\Database\KategoriaController;
use App\Http\Controllers\Database\PizzaController;
use App\Http\Controllers\Database\RendelesController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\GenericDbController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use App\Http\Middleware\ExistingDbCheck;
use App\Http\Middleware\AdminCheck;

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

#CRUD
Route::middleware([AdminCheck::class])->group(function () {

    Route::get('/crud', [CrudController::class, 'index'])->name('crud.kategoria.index');

    Route::get('/crud/create', [CrudController::class, 'create'])->name('crud.kategoria.create');
    Route::post('/crud', [CrudController::class, 'store'])->name('crud.kategoria.store');

    Route::get('/crud/{id}/edit', [CrudController::class, 'edit'])->name('crud.kategoria.edit');
    Route::put('/crud/{id}', [CrudController::class, 'update'])->name('crud.kategoria.update');

    Route::delete('/crud/{id}', [CrudController::class, 'destroy'])->name('crud.kategoria.destroy');

});