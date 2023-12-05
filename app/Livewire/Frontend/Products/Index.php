<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Category;
use App\Models\Product;
use App\Services\Frontend\Product\Contracts\Filter;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public Collection $categories;
    public string $searchQuery = '';
    public array $searchCategory = [];
    public ?int $fromPrice = null;
    public ?int $toPrice = null;
    public array $paginates = [15, 20, 50, 100, 0];
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

    public function render(): View
    {
        $products = Product::with('categories')->
            when($this->searchQuery, function (Builder $query) {
                $query->where('name', 'like', '%' . $this->searchQuery . '%');
            })
           /* ->when($this->searchCategory, function (Builder $query) {
                $query->whereHas('categories', function ($query2) {
                    $query2->whereIn('category_id', $this->searchCategory);
                });
            })*/
            ->when($this->toPrice || $this->fromPrice, function (Builder $query) {
                $query->wherePriceBetween($this->fromPrice, $this->toPrice);
            });
            $products = $this->paginate === 0 ? $products->get() : $products->paginate($this->paginate);
        return view('livewire.frontend.products.index', compact('products'))
            ->layout('layouts.app');
    }
}
