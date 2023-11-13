<?php

use App\Liveware as Liveware;
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

Route::get('/register',Liveware\RegisterForm::class);
Route::get('/login',Liveware\LoginForm::class);
Route::view('/','home')->name('home');
Route::get('/products/create',Liveware\CreateProduct::class)->name('product.create');
Route::get('products/{product}/edit', Liveware\EditProduct::class)->name('product.edit');
//Route::get('/products',Liveware\CreateProduct::class)->name('home');
//Route::view('login','livewire.auth.home');
//Route::view('product/create', 'products.create');



//require __DIR__.'/auth.php';
