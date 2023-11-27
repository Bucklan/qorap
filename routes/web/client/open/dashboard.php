<?php

use Illuminate\Support\Facades\Route;
use App\Livewire as LiveWire;

Route::get('/dashboard', Livewire\Users\Dashboard::class)
    ->name('dashboard');
