<?php

namespace App\Livewire\Frontend\Components;

use App\Livewire\Frontend\Products\Index;
use Livewire\Component;

class PriceFilter extends Component
{
    public Index $index;
    public function render()
    {
        return view('livewire.frontend.components.price-filter')
            ->layout('layouts.app');
    }
}
