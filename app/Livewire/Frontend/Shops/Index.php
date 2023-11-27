<?php

namespace App\Livewire\Frontend\Shops;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.users.shops.index')->layout('layouts.app');
    }
}
