<?php

use Illuminate\Support\Facades\Route;
use App\Liveware as Livewire;

Route::get('dashboard', Livewire\Admin\Employer\Dashboard::class)->name('admin.employer.dashboard');


