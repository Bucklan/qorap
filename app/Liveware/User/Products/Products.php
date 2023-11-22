<?php

namespace App\Liveware\User\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;


    public Collection $categories;
    public string $searchQuery = '';
    public int $searchCategory = 0;
    public int $fromPrice = 0;
    public int $toPrice = 0;
    public int $paginate = 15;

    public function mount(): void
    {
        $this->categories = Category::with('products')->get();
    }

    public function updating($key): void
    {
        if ($key === 'searchQuery'
            || $key === 'searchCategory'
            || $key === 'deleteProduct'
            || $key === 'fromPrice'
            || $key === 'toPrice'
            || $key === 'paginate'
        ) {
            $this->resetPage();
        }
    }

    function updatedFromPrice($value): void
    {
        $this->fromPrice = (int)$value;
    }

    function updatedPaginate($value): void
    {
        $this->paginate = (int)$value;
    }

    function updatedToPrice($value): void
    {
        $this->toPrice = (int)$value;
    }

    public function deleteProduct(int $productId): void
    {
        $product = Product::where('id', $productId)->first();

        $product->delete();
        session()->flash('message', 'Your product successfully deleted!');
    }

    public function render(): View
    {
        $products = Product::with('categories')
            ->when($this->searchQuery !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->searchQuery . '%'))
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->whereHas('categories', function ($query) {
                $query->where('category_id', $this->searchCategory);
            }))->when($this->fromPrice || $this->toPrice, fn(Builder $query) => $query->wherePriceBetween($this->fromPrice, $this->toPrice));
        $products = $this->paginate ? $products->paginate($this->paginate) : $products->get();

        return view('liveware.users.products.index', [
            'products' => $products,
        ])->layout('layouts.app');
    }
}
