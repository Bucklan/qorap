<?php

namespace App\Livewire\Admin\Partner;

use Livewire\Component;

class Dashboard extends Component
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.partner.dashboard');
    }
}