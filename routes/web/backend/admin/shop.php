<?php

use \Illuminate\Support\Facades\Route;

Route::get('shops', \App\Livewire\Backend\Admin\Shop\Index::class)->name('shops.index');