<?php

use App\LiveWire as Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/register', \App\Livewire\Frontend\Auth\RegisterForm::class)
    ->name('register');