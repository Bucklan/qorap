<?php

namespace App\Liveware;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }
    public function render(): View
    {
        $products = Product::with('categories')
            ->paginate(10);
        return view('liveware.products', [
            'products' => $products,
        ]);
    }
}
