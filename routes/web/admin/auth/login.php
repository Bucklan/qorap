<?php

use Illuminate\Support\Facades\Route;
use App\Livewire as Livewire;
Route::get('login', Livewire\Admin\Auth\Login::class)
    ->name('login');


