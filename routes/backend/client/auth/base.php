<?php

use App\Livewire as Livewire;
use Illuminate\Support\Facades\Route;



    require_once('login/login.php');
    require_once('register/register.php');

Route::middleware('auth')->group(function () {
    Route::post('logout', Livewire\Frontend\Auth\Logout::class)->name('logout');
});

