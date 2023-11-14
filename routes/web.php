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
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::get('/register',Liveware\RegisterForm::class);
Route::get('/login',Liveware\LoginForm::class);



//require __DIR__.'/auth.php';
