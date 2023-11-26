<?php

namespace App\Livewire\Admin\Components;

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
        return view('livewire.admin.components.product-item')->layout('layouts.admin');
    }
}
