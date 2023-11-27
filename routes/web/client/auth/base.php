<?php

use Illuminate\Support\Facades\Route;
use App\Livewire as Livewire;


Route::middleware('guest')->group(function () {
    require_once('login/login.php');
    require_once('register/register.php');
});
Route::middleware('auth')->group(function () {
    Route::post('logout', Livewire\Users\Auth\Logout::class)->name('logout');
});
