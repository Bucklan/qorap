<?php

namespace App\Liveware;

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
    public $listeners = ['deleteProduct'];
    public bool $alertClass = false;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function updating($key): void
    {
        if ($key === 'searchQuery' || $key === 'searchCategory' || $key === 'deleteProduct') {
            $this->resetPage();
        }
    }

    public function addClass()
    {
        $this->alertClass = true;
    }

    public function deleteProduct(int $productId): void
    {
        $product = Product::where('id',$productId)->first();

        $product->delete();
        session()->flash('message','Your product successfully deleted!');
    }

    public function render(): View
    {
        $products = Product::with('categories')
//            ->where('quantity','>','0')
            ->when($this->searchQuery !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $this->searchQuery . '%'))
            ->when($this->searchCategory > 0, fn(Builder $query) => $query->whereHas('categories', function ($query) {
                $query->where('category_id', $this->searchCategory);
            }))
//            ->when($this->minPrice > 0 && $this->maxPrice > $this->minPrice, fn(Builder $query) =>
//             $query->where('price', '>=', $this->minPrice)->where('price', '<=', $this->maxPrice))
            ->paginate(10);

        return view('liveware.products', [
            'products' => $products,
        ]);
    }
}
