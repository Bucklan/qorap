<?php

namespace App\Livewire\Users\Products;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{

    private $product;

    public function mount($product)
    {
        $this->product = Product::find($product);;
    }

    public function render()
    {
        return view('livewire.users.products.show', ['product' => $this->product])->layout('layouts.app');
    }
}