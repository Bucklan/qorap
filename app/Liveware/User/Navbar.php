<?php

namespace App\Liveware\User;

use Livewire\Component;

class Navbar extends Component
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('liveware.users.navbar');
    }
}
