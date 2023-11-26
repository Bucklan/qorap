<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products;
    public $categories;
    public function mount(){
        $this->products = Product::get();
        $this->categories = Category::get();
    }
    public function render()
    {
        return view('livewire.admin.products.index',
            [
                'products' => $this->products,
                'categories' => $this->categories,
            ]
        )->layout('layouts.admin');
    }
}
