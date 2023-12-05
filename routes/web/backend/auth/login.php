<?php

use App\Livewire as Livewire;
use Illuminate\Support\Facades\Route;

Route::get('login', Livewire\Backend\Auth\Login::class)
    ->name('login');


