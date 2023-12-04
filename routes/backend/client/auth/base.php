<?php

use App\Livewire as Livewire;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


require_once('login/login.php');
require_once('register/register.php');
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);


Route::middleware('auth')->group(function () {
    Route::post('logout', function (Illuminate\Http\Request $request) {
        Auth::guard('web')->logout();
        return redirect(RouteServiceProvider::HOME);
    })->name('logout');
});


