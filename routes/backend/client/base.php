<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
//    require_once('user/addresses.php');
//    require_once('user/carts.php');
//    require_once('user/orders.php');
//    require_once('user/profile.php');
//    require_once('user/cities.php');
});

//require_once('open/categories.php');
require_once('open/products.php');
require_once('open/dashboard.php');
//require_once('open/comments.php');

Route::get('', function () {
    return redirect()->route('dashboard');
});

Route::middleware('guest')->group(function () {
    require_once('auth/base.php');
});
Route::get('auth/google',[App\Http\Controllers\Auth\GoogleController::class,'redirectGoogle']);
Route::get('auth/google/callback',[App\Http\Controllers\Auth\GoogleController::class,'handleGoogleCallback']);

