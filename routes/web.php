<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;

// AUTH ROUTES
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

// PROTECTED ROUTES
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});
Route::middleware('auth')->group(function () {
    Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'show'])->name('profil.show');
    Route::post('/profil', [App\Http\Controllers\ProfileController::class, 'update'])->name('profil.update');
});
