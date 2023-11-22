<?php

namespace App\Liveware\User;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('liveware.users.dashboard')->layout('layouts.app');
    }
}