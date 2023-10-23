<?php

use App\Http\Controllers\Client\User\Cart\CartController;
use Illuminate\Support\Facades\Route;

Route::post('/cart/{gift}/putToCart', [CartController::class, 'putToCart'])->name('cart.puttocart');
Route::post('/cart/{gift}/removecart', [CartController::class, 'removecart'])->name('cart.removecart');
Route::post('/cart/{gift}/deleteFromCart', [CartController::class, 'deleteFromCart'])->name('cart.deletefromcart');
Route::post('/cart/deleteallcart', [CartController::class, 'deleteallcart'])->name('cart.deleteallcart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'buy'])->name('cart.buy');
