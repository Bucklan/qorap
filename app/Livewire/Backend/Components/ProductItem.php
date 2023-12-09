<?php

namespace App\Livewire\Backend\Components;

use App\Livewire\Backend\Admin\Product\Delete;
use Livewire\Component;

class ProductItem extends Component
{
    public $product;

    public function mount($product): void
    {
        $this->product = $product;
    }

    public function deleteProduct(): void
    {
        dd($this->product->id);
        $this->product->delete();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.components.product-item')->layout('layouts.admin');
    }
}
