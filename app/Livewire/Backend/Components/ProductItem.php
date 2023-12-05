<?php

namespace App\Livewire\Backend\Components;

use Livewire\Component;

class ProductItem extends Component
{
    public $product;

    public function mount($product): void
    {
        $this->product = $product;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.components.product-item')->layout('layouts.admin');
    }
}
