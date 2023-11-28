<?php

use App\Livewire as Livewire;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', Livewire\Backend\Employer\Dashboard::class)->name('admin.employer.dashboard');


