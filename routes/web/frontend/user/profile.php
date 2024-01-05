<?php

use Illuminate\Support\Facades\Route;
Route::get('/profile', \App\Livewire\Frontend\Profile\Index::class)->name('profile.index');
//Route::get('/profile', [LoginController::class, 'profile'])->name('profile.form');
//Route::post('/profile', [LoginController::class, 'profile'])->name('profile');
//
//Route::put('/update/{update}', [RegisterController::class, 'update'])->name('update');
