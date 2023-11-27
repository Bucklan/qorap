<?php
use App\LiveWire as Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/register', Livewire\Users\Auth\RegisterForm::class)
    ->name('register');