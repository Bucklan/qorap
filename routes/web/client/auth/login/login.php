<?php

use App\LiveWire as Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/login', \App\Livewire\Frontend\Auth\LoginForm::class)
    ->name('login');
