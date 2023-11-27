<?php


use Illuminate\Support\Facades\Route;
use App\Livewire as LiveWire;

Route::get('products', Livewire\Users\Products\Products::class)->name('products.index');
Route::get('products/{product}', Livewire\Users\Products\Show::class)->name('products.show');

//Route::resource('/gift', GiftController::class)->only('index', 'show', 'giftByCategory');
//Route::get('/gift/category/{category}', [GiftController::class, 'giftByCategory'])->name('gift.category');
//Route::get('/gift/gender/{gender}', [GiftController::class, 'giftByGender'])->name('gift.gender');
////like
//Route::post('/gift/{gift}/like', [GiftController::class, 'like'])->name('gifts.like');
////rating
//Route::post('/gift/{gift}/rate', [GiftController::class, 'rate'])->name('gifts.rate');
//Route::post('/gift/{gift}/unrate', [GiftController::class, 'unrate'])->name('gifts.unrate');
////selected
//Route::get('/selected', [GiftController::class, 'selected'])->name('selected');
////search
//Route::get('gifts/search', [GiftController::class, 'index'])->name('gifts.search');
