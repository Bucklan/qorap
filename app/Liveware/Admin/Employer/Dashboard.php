<?php

namespace App\Liveware\Admin\Employer;

use Livewire\Component;

class Dashboard extends Component
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('liveware.admin.employer.dashboard')->layout('layouts.admin');
    }
}