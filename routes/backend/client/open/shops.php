<?php

use App\Livewire as Livewire;
use Illuminate\Support\Facades\Route;


Route::get('shops', Livewire\Frontend\Shops\Index::class)->name('shops.index');
Route::get('shops/{shop}', Livewire\Frontend\Shops\Show::class)->name('shops.show');