<?php

use App\Http\Controllers\Client\Open\GiftController;
use Illuminate\Support\Facades\Route;

Route::resource('/gift', GiftController::class)->only('index', 'show', 'giftByCategory');
Route::get('/gift/category/{category}', [GiftController::class, 'giftByCategory'])->name('gift.category');
Route::get('/gift/gender/{gender}', [GiftController::class, 'giftByGender'])->name('gift.gender');
//like
Route::post('/gift/{gift}/like', [GiftController::class, 'like'])->name('gifts.like');
//rating
Route::post('/gift/{gift}/rate', [GiftController::class, 'rate'])->name('gifts.rate');
Route::post('/gift/{gift}/unrate', [GiftController::class, 'unrate'])->name('gifts.unrate');
//selected
Route::get('/selected', [GiftController::class, 'selected'])->name('selected');
//search
Route::get('gifts/search', [GiftController::class, 'index'])->name('gifts.search');
