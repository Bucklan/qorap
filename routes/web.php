<?php

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
    return view('home');
});
//Route::view('login','livewire.auth.home');
Route::view('product/create', 'products.create');
Route::get('product/{product}/edit', \App\Liveware\EditProduct::class);



//require __DIR__.'/auth.php';
