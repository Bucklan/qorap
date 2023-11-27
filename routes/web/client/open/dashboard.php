<?php

use App\Livewire as LiveWire;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', LiveWire\Frontend\Elements\Dashboard::class)
    ->name('dashboard');
