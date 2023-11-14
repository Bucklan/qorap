<?php

namespace App\Liveware;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ProductsCreate extends Component
{
    #[Rule('required|min:3')]
    public string $name = '';
    #[Rule('required|min:3')]
    public string $description = '';
    #[Rule('required|exists:categories,id' , as: 'category')]
    public array $category_id;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function save(): void
    {

        $this->validate();
        $product = Product::create($this->only(['name', 'description']));
        foreach ($this->category_id as $categoryId) {
            $category = Category::find($categoryId);

            if ($category) {
                $category->products()->attach($product->id);
            }
        }
        $this->redirect('/products');
    }

    public function render(): View
    {
        return view('liveware.products-create');
    }
}
