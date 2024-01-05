<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->as('admin.')->group(function () {
        require_once('auth/login.php');
    Route::middleware('auth')->group(function () {
        Route::get('',function (){
            return redirect()->route('admin.dashboard');
        });
        require_once ('admin/shop.php');
        require_once('admin/base.php');
        require_once('partner/base.php');

        });
});



