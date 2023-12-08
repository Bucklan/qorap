<?php

namespace App\Livewire\Backend\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $categories;
    public function mount(): void
    {
        $this->categories = Category::with('children')->whereNull('parent_id')->get();


    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::paginate(7);
        return view('livewire.backend.admin.products.index',
            compact('products'))
            ->layout('layouts.admin');
    }
}
