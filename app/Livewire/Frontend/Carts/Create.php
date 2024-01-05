<?php

namespace App\Livewire\Frontend\Carts;

use Livewire\Component;

class Create extends Component
{
    public $product;
    public $quantity;
    public $price_id;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.cart.create');
    }
}
