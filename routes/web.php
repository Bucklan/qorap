<?php

use App\Livewire\Backend as Backend;

Route::prefix('admin')->as('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', Backend\Auth\Login::class)
            ->name('login');
    });
    Route::middleware('auth')->group(function () {
        Route::get('',function (){
            return redirect()->route('admin.dashboard');
        });
        Route::middleware('role:ADMIN|MANAGER')->group(function () {
            //products
            Route::get('products', Backend\Admin\Product\Index::class)->name('products.index');
            Route::get('products/create', Backend\Admin\Product\Create::class)->name('products.create');
            Route::get('products/{product}/edit', Backend\Admin\Product\Edit::class)->name('products.edit');
            Route::delete('products/{product}',Backend\Admin\Product\Delete::class)->name('products.delete');

            //shops
            Route::get('shops', Backend\Admin\Shop\Index::class)->name('shops.index');
            Route::get('shops/create', Backend\Admin\Shop\Create::class)->name('shops.create');

            //dashboard
            Route::get('dashboard', Backend\Admin\Dashboard::class)->name('dashboard');

            //categories

        });

        Route::middleware('role:PARTNER|ADMIN')->group(function () {
       //
        });
    });
});