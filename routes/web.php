<?php

use App\Enums\User\Role;
use App\Liveware as Liveware;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

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
//    return redirect()->route('dashboard');
})->middleware('guest');
Route::get('/dashboard', Liveware\User\Dashboard::class)->name('dashboard');
Route::get('products', Liveware\User\Products\Products::class)->name('products.index');
Route::get('products/create', Liveware\User\Products\ProductsCreate::class)->name('products.create');
Route::get('products/{product}/edit', Liveware\User\Products\ProductsEdit::class)->name('products.edit');
    Route::get('/register', Liveware\User\Auth\RegisterForm::class)->name('register');
    Route::get('/login', Liveware\User\Auth\LoginForm::class)->name('login');
    Route::post('logout', Liveware\User\Auth\Logout::class)->name('logout');
Route::prefix('admin')->as('admin.')
    ->group(function (){
        Route::get('',function (){
            return redirect()->route('admin.employer.dashboard');
        });
        Route::get('login', Liveware\Admin\Auth\Login::class)->name('login')->middleware('guest');
        Route::get('dashboard', Liveware\Admin\Employer\Dashboard::class)->name('employer.dashboard')->middleware('auth');
});



//require __DIR__.'/auth.php';


