<?php

use App\Http\Controllers\PizzaDbController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;

Route::get('/db', function() { return view('db_select'); });
Route::addRoute(['GET','POST'], '/db/{table}', [PizzaDbController::class, 'show']);