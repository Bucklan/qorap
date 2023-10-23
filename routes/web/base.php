<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

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
Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');
Route::middleware('auth')->group(function () {

//    Route::prefix('adm')->as('adm.')->middleware('hasrole:ADMIN,MODERATOR')->group(function () {
//        Route::delete('/partner/{partner}/destroy', [PartnerContoller::class, 'destroy'])->name('partner.delete');
//        Route::put('/partner/{partner}/update', [PartnerContoller::class, 'update'])->name('partner.update');
//        Route::get('partner/{partner}', [UserController::class, 'showPartners'])->name('partners.show');
//        Route::get('partners', [UserController::class, 'partners'])->name('partners.request');
//        Route::resource('categories', CategoryController::class);
//        Route::get('gifts', [UserController::class, 'gifts'])->name('users.gifts');
//        Route::get('/cart', [UserController::class, 'cart'])->name('cart.index');
//        Route::put('/cart/{cart}/confirm', [UserController::class, 'confirm'])->name('cart.confirm');

////        users
//        Route::middleware('hasrole:ADMIN')->group(function () {
//            Route::get('/users', [UserController::class, 'index'])->name('users.index');
//            Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
//            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//            Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
//            Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
//            Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
//        });
//    });


//    Route::middleware('hasrole:PARTNER')->group(function () {
//        Route::get('/partner/mygifts', [PartnerContoller::class, 'index'])->name('partner.myGifts');
//    });
});


Route::middleware('guest')->group(function () {
    require_once('auth/base.php');
});

Route::middleware('auth')->group(function (){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

