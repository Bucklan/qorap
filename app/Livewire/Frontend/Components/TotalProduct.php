<?php

namespace App\Livewire\Frontend\Components;

use App\Livewire\Frontend\Products\Index;
use Livewire\Component;

class TotalProduct extends Component
{
    public $total;
    public function render()
    {
        return view('livewire.frontend.components.total-product');
    }
}
