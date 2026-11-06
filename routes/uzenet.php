<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UzenetController;

Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek.index');