<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UzenetController;
use App\Http\Middleware\AdminCheck;

Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek.index')
    ->middleware(AdminCheck::class . ':user')
    ->name('uzenetek.index');
Route::get('/uzenet', [UzenetController::class, 'create'])->name('uzenetek.create');
Route::post('/uzenet', [UzenetController::class, 'store'])->name('uzenetek.store');