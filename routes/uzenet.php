<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UzenetController;

Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek.index');
Route::get('/uzenet', [UzenetController::class, 'create'])->name('uzenetek.create');
Route::post('/uzenet', [UzenetController::class, 'store'])->name('uzenetek.store');