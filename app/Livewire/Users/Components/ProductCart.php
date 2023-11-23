<?php

namespace App\Livewire\Users\Components;

use Livewire\Component;

class ProductCart extends Component
{
    public $product;

    public function mount($product): void
    {
        $this->product = $product;
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.users.components.product-cart')->layout('layouts.app');
    }
}
