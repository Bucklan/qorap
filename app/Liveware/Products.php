<?php

namespace App\Liveware;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public Collection $categories;
    public string $searchQuery = '';
    public int $searchCategory = 0;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

//    public function validateTitle(): void
//    {
//        $this->validateOnly('title');
//    }
    public function render(): View
    {

        $products = Product::with('categories')
            ->when($this->searchQuery !== '', fn(Builder $query)
                    => $query->where('name', 'like','%' .$this->searchQuery.'%'))
            ->when($this->searchCategory > 0, fn(Builder $query)
                    =>  $query->whereHas('categories', function ($query) {
                $query->where('category_id', $this->searchCategory);
            }))
//        $query->where('category_id',$this->searchCategory))

            ->paginate(10);
//        dd($products);

        return view('liveware.products', [
            'products' => $products,
        ]);
    }
}
