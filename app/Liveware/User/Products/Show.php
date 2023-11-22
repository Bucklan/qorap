<?php

namespace App\Liveware\User\Products;

use Livewire\Component;

class Show extends Component
{


    public function render()
    {
        return view('liveware.users.products.show')->layout('layouts.app');
    }
}