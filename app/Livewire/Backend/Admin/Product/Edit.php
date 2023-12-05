<?php

namespace App\Livewire\Backend\Admin\Product;

use App\Models as Models;
use Livewire\Component;

class Edit extends Component
{
    public $product;
    public $name;
    public $description;
    public $price;
    public $short_description;
    public $quantity;
    public $type;
    public $images;


    public function mount(Models\Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->short_description = $product->short_description;
        $this->quantity = $product->quantity;
        $this->type = $product->type;
    }
    public function render()
    {
        $categories = Models\Category::all();
        $colors = Models\Color::all();
        return view('livewire.backend.admin.products.edit',
            compact('categories', 'colors'))
            ->layout('layouts.admin');
    }
}
