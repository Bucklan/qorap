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
Route::get('/qwe',function (){
    return view('admin.app');
});
Route::get('',function (){
    return view('layouts.app');
});
Route::get('/dashboard', Liveware\Dashboard::class)->name('dashboard');
Route::get('products', Liveware\Products::class)->name('products.index');
Route::get('products/create', Liveware\ProductsCreate::class)->name('products.create');
Route::get('products/{product}/edit', Liveware\ProductsEdit::class)->name('products.edit');
Route::middleware('guest')->group(function (){
    Route::get('/register',Liveware\RegisterForm::class);
    Route::get('/login',Liveware\LoginForm::class);
});
Route::middleware('auth')->group(function (){
    Route::post('logout',Liveware\Logout::class)->name('logout');
});
Route::prefix('admin')->as('admin.')->middleware('role:admin')->group(function (){
    Route::get('',Liveware\Admin\AdminDashboard::class)->name('index');
});


//require __DIR__.'/auth.php';


