<?php
use App\Livewire as Livewire;
use Illuminate\Support\Facades\Route;
Route::get('dashboard', Livewire\Backend\Admin\Dashboard::class)->name('dashboard');
