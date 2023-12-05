<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;

class Dashboard extends Component
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.employer.dashboard')->layout('layouts.admin');
    }
}