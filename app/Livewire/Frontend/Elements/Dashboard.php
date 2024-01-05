<?php

namespace App\Livewire\Frontend\Elements;

use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
    public $products;
    public $categories;

    public function mount()
    {
        $this->products = Product::with('categories','shop', 'media','colors')
            ->latest('created_at')
            ->take(10)
            ->get();
        $this->categories = \App\Models\Category::whereNull('parent_id')->get();
    }

    public function render()
    {
        return view('livewire.frontend.elements.dashboard')->layout('layouts.app');
    }
}