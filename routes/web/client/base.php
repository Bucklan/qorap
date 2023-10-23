<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    require_once('user/addresses.php');
    require_once('user/carts.php');
    require_once('user/orders.php');
    require_once('user/profile.php');
});

require_once('open/categories.php');
require_once('open/gifts.php');
require_once('open/cities.php');
require_once('open/comments.php');

