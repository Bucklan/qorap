<?php

namespace App\Liveware\Admin\Partner;

use Livewire\Component;

class Dashboard extends Component
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('liveware.admin.partner.dashboard');
    }
}