<?php

use \Illuminate\Support\Facades\Route;

Route::get('shops', \App\Livewire\Backend\Admin\Shop\Index::class)->name('shops.index');
Route::get('shops/create', \App\Livewire\Backend\Admin\Shop\Create::class)->name('shops.create');