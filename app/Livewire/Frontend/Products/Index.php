<?php

namespace App\Livewire\Frontend\Products;

use App\Models as Models;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $categories;
    public $colors;
    public $shops;
    public string $searchQuery = '';
    public array $searchCategory = [];
    public array $searchColor = [];
    public array $searchShop = [];
    public ?int $fromPrice = null;
    public ?int $toPrice = null;
    public array $paginates = [15, 20, 50, 100];
    public int $paginate = 15;

    public function mount(): void
    {
        $this->categories = Models\Category::withCount('products')->get();
        $this->colors = Models\Color::withCount('products')->get();
        $this->shops = Models\Shop::withCount('products')->get();

    }

    public function LengthPagination(int $length): void
    {
        $this->paginate = $length;
    }

    public function updating($key): void
    {
        if ($key === 'searchQuery' || $key === 'searchCategory'
            || $key === 'fromPrice' || $key === 'toPrice'
            || $key === 'paginate' || $key === 'searchColor'
        ) {
            $this->resetPage();
        }
    }

    function updated($value): void
    {
        $this->fromPrice = (int)$value;
        $this->toPrice = (int)$value;
        $this->paginate = (int)$value;
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
        $products = Models\Product::withCount('categories', 'colors', 'shop', 'media')
            ->when($this->searchQuery, function (Builder $query) {
                $query->whereNameAndDescription($this->searchQuery);
            })
            ->when($this->searchCategory, function (Builder $query) {
                $query->getCategory($this->searchCategory);
            })
            ->when($this->toPrice || $this->fromPrice, function (Builder $query) {
                $query->wherePriceBetween($this->fromPrice, $this->toPrice);
            })->paginate($this->paginate);
        return view('livewire.frontend.products.index', compact('products'))
            ->layout('layouts.app');
    }
}
