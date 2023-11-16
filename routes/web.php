<?php

use App\Http\Controllers\ProductController;
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
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('products/{product}/edit', Liveware\ProductsEdit::class)->name('products.edit');
//Route::get('products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::get('/register',Liveware\RegisterForm::class);
Route::get('/login',Liveware\LoginForm::class);



//require __DIR__.'/auth.php';
