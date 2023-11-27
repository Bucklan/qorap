<?php

use App\LiveWire as Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/login', Livewire\Users\Auth\LoginForm::class)
    ->name('login');
