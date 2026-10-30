<?php

use App\Http\Controllers\PizzaDbController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use App\Http\Middleware\ExistingDbCheck;

Route::get('/db', function() { return view('db_select'); })->name('db_select');
Route::middleware(['db_exists'])->get('/db/{table}', [PizzaDbController::class, 'show_all'])->name('db_display');