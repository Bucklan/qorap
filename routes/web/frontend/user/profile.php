<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/profile', [LoginController::class, 'profile'])->name('profile.form');
Route::post('/profile', [LoginController::class, 'profile'])->name('profile');

Route::put('/update/{update}', [RegisterController::class, 'update'])->name('update');
