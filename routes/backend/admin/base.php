<?php
use Illuminate\Support\Facades\Route;

Route::middleware('role:ADMIN|MANAGER|PARTNER')
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
                require_once('auth/login.php');
            });
        require_once('admin/base.php');
        require_once('partner/base.php');
    });



