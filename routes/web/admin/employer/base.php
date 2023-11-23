<?php

use App\Livewire as Livewire;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', \App\Livewire\Admin\Employer\Dashboard::class)->name('admin.employer.dashboard');


