<?php

namespace App\Livewire\Users;

use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.users.dashboard')->layout('layouts.app');
    }
}