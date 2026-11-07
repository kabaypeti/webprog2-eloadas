<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PizzaDbController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::user()) {
        if (Auth::user()->role === 1)
            return redirect('admin');
        return redirect('user');
    }
    return view('introduction'); 
} )->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', [ AdminController::class, 'adminPage' ]);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/db.php';
require __DIR__ .'/uzenet.php';