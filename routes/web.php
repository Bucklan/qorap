<?php

use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\Adm\CommentController;
use App\Http\Controllers\Adm\PartnerContoller;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GiftController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\LangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('gifts.index');
    return redirect()->route('home');
});
Route::get('gifts/search', [GiftController::class, 'index'])->name('gifts.search');
Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');
Route::middleware('auth')->group(function () {
    Route::get('/selected', [GiftController::class, 'selected'])->name('selected');
    Route::post('/balance', [GiftController::class, 'my_balance'])->name('balance');
    Route::get('/balance', [GiftController::class, 'Getbalance'])->name('Getbalance');
    Route::post('/partner', [PartnerContoller::class, 'store'])->name('partner.store');
    Route::get('/partner', [PartnerContoller::class, 'create'])->name('partner.create');
    Route::post('/cart/{gift}/putToCart', [CartController::class, 'putToCart'])->name('cart.puttocart');
    Route::post('/cart/{gift}/removecart', [CartController::class, 'removecart'])->name('cart.removecart');
    Route::post('/cart/{gift}/deleteFromCart', [CartController::class, 'deleteFromCart'])->name('cart.deletefromcart');
    Route::post('/cart/deleteallcart', [CartController::class, 'deleteallcart'])->name('cart.deleteallcart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'buy'])->name('cart.buy');
    Route::post('/gift/{gift}/like', [GiftController::class, 'like'])->name('gifts.like');
    Route::post('/gift/{gift}/rate', [GiftController::class, 'rate'])->name('gifts.rate');
    Route::post('/gift/{gift}/unrate', [GiftController::class, 'unrate'])->name('gifts.unrate');
    Route::resource('/gift', GiftController::class)->except('index', 'show', 'giftByCategory');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::put('/update/{update}', [RegisterController::class, 'update'])->name('update');
    Route::get('/profile', [LoginController::class, 'profile'])->name('profile.form');
    Route::post('/profile', [LoginController::class, 'profile'])->name('profile');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:ADMIN,MODERATOR')->group(function () {
        Route::delete('/partner/{partner}/destroy', [PartnerContoller::class, 'destroy'])->name('partner.delete');
        Route::put('/partner/{partner}/update', [PartnerContoller::class, 'update'])->name('partner.update');
        Route::resource('genders', CategoryController::class);
        Route::get('partner/{partner}', [UserController::class, 'showPartners'])->name('partners.show');
        Route::get('partners', [UserController::class, 'partners'])->name('partners.request');
        Route::resource('categories', CategoryController::class);
        Route::get('gifts', [UserController::class, 'gifts'])->name('users.gifts');
        Route::get('/cart', [UserController::class, 'cart'])->name('cart.index');
        Route::put('/cart/{cart}/confirm', [UserController::class, 'confirm'])->name('cart.confirm');
        Route::middleware('hasrole:ADMIN')->group(function () {
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
            Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
            Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
        });
    });
    Route::middleware('hasrole:PARTNER')->group(function () {
        Route::get('/partner/mygifts', [PartnerContoller::class, 'index'])->name('partner.myGifts');
    });
});
Route::resource('/gift', GiftController::class)->only('index', 'show', 'giftByCategory');
Route::get('/home', [GiftController::class, 'home'])->name('home');
Route::get('/gift/category/{category}', [GiftController::class, 'giftByCategory'])->name('gift.category');
Route::get('/gift/gender/{gender}', [GiftController::class, 'giftByGender'])->name('gift.gender');
Route::resource('comments', CommentController::class);



Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
