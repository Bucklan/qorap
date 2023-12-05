<?php

use Illuminate\Support\Facades\Route;

Route::middleware('role:PARTNER|ADMIN')->group(function () {
    require_once('product.php');
    require_once('profile.php');
    require_once('dashboard.php');
    require_once('order.php');
//    require_once('comment.php');
});