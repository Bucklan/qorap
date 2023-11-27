<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Category;
use App\Models\Product;
use App\Services\Frontend\Product\Contracts\Filter;
use Illuminate\Contracts\View\View;
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
        $products = app(Filter::class)
            ->execute(
                $this->searchQuery,
                $this->searchCategory,
                $this->fromPrice,
                $this->toPrice,
                $this->paginate);

        return view('livewire.frontend.products.index', [
            'products' => $products,
        ])->layout('layouts.app');
    }
}
