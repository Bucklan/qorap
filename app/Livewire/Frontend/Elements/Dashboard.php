<?php

namespace App\Livewire\Frontend\Elements;

use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        return view('livewire.frontend.elements.dashboard')->layout('layouts.app');
    }
}