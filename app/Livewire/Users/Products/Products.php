<?php

namespace App\Livewire\Users\Products;

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
    public array $searchCategory = [];
    public ?int $fromPrice = null;
    public ?int $toPrice = null;
    public array $paginates = [15,20,50,100,0];
    public int $paginate = 15;
    protected $queryString = ['searchCategory'];

    public function mount(): void
    {
        $this->categories = Category::with('products')->get();
    }
    public function LengthPagination(int $length): void
    {
        $this->paginate = $length;
    }

    public function updating($key): void
    {
        if ($key === 'searchQuery'
            || $key === 'searchCategory'
//            || $key === 'deleteProduct'
            || $key === 'fromPrice'
            || $key === 'toPrice'
            || $key === 'paginate'
        ) {
            $this->resetPage();
        }
    }
    function updated($value): void
    {
        $this->fromPrice = (int)$value;
        $this->paginate = (int)$value;
        $this->toPrice = (int)$value;
    }
    function updatedFromPrice($value): void
    {
        $this->fromPrice = (int)$value;
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
            ->when($this->searchQuery !== '', fn(Builder $query)
            => $query->where('name', 'like', '%' . $this->searchQuery . '%'))->orWhere('description', 'like', '%' . $this->searchQuery . '%')
            ->when(count($this->searchCategory) > 0, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->whereIn('category_id', $this->searchCategory);
                });
            })
            ->when($this->fromPrice || $this->toPrice, fn(Builder $query) => $query->wherePriceBetween($this->fromPrice, $this->toPrice));
        $products = $this->paginate ? $products->paginate($this->paginate) : $products->get();

        return view('livewire.users.products.index', [
            'products' => $products,
        ])->layout('layouts.app');
    }
}
