<?php

use App\Livewire as Livewire;
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

Route::get('',function (){
    return redirect()->route('dashboard');
});
Route::get('/dashboard', Livewire\Users\Dashboard::class)->name('dashboard');
Route::get('products', Livewire\Users\Products\Products::class)->name('products.index');
Route::get('products/{product}', Livewire\Users\Products\Show::class)->name('products.show');
Route::get('products/create', Livewire\Users\Products\ProductsCreate::class)->name('products.create');
Route::get('products/{product}/edit', Livewire\Users\Products\ProductsEdit::class)->name('products.edit');
    Route::get('/register', Livewire\Users\Auth\RegisterForm::class)->name('register');
    Route::get('/login', Livewire\Users\Auth\LoginForm::class)->name('login');
    Route::post('logout', Livewire\Users\Auth\Logout::class)->name('logout');
Route::middleware('role:ADMIN|MANAGER|PARTNER')->prefix('admin')->as('admin.')
    ->group(function (){
        Route::get('',function (){
            return redirect()->route('admin.employer.dashboard');
        });
        Route::get('login', Livewire\Admin\Auth\Login::class)->name('login')->middleware('guest');
        Route::get('dashboard', Livewire\Admin\Employer\Dashboard::class)->name('employer.dashboard')->middleware('auth');
});



//require __DIR__.'/auth.php';


