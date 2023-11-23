<?php

namespace App\Livewire\Users;

use Livewire\Component;

class Navbar extends Component
{
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.users.navbar');
    }
}
