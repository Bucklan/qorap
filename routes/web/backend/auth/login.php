<?php

use App\Livewire as Livewire;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', Livewire\Backend\Auth\Login::class)
        ->name('login');
});

