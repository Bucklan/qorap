<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{

    public $product;

    public function mount($product)
    {
        $this->product = Product::find($product);;
    }

    public function render()
    {
        return view('livewire.frontend.products.show')->layout('layouts.app');
    }
}