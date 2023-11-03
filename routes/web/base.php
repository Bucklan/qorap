<?php

use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

require_once('client/base.php');
//require_once('admin/base.php');
    require_once('auth/base.php');
Route::get('/',function (){
    return view('welcome');
});
Route::middleware('auth')->group(function (){
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

