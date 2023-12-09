<?php

use Illuminate\Support\Facades\Route;
use App\Livewire as Livewire;

Route::get('products', Livewire\Backend\Admin\Product\Index::class)
    ->name('products.index');
Route::get('products/create', Livewire\Backend\Admin\Product\Create::class)
    ->name('products.create');

Route::get('products/{product}/edit', Livewire\Backend\Admin\Product\Edit::class)
    ->name('products.edit');

Route::delete('products/{product}',Livewire\Backend\Admin\Product\Delete::class)
    ->name('products.delete');