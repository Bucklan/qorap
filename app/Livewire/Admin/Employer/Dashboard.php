<?php

namespace App\Livewire\Admin\Employer;

use Livewire\Component;

class Dashboard extends Component
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.employer.dashboard')->layout('layouts.admin');
    }
}