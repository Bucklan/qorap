<?php

use Illuminate\Support\Facades\Route;
Route::middleware('role:ADMIN|MANAGER')->group(function () {
    require_once('product.php');
    require_once('shop.php');
    require_once('dashboard.php');
    require_once('order.php');
//    require_once('comment.php');
//    require_once('category.php');
//    require_once('user.php');
//    require_once('city.php');
//    require_once('district.php');
//    require_once('ward.php');
//    require_once('partner.php');
//    require_once('role.php');
//    require_once('permission.php');
//    require_once('role_permission.php');
//    require_once('user_role.php');
//    require_once('shop_product.php');
//    require_once('shop_order.php');
});

