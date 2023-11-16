<?php

namespace App\Liveware;

use App\Models\Category;
use Illuminate\Support\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Product;

class ProductsEdit extends Component
{
    #[Locked]
    public int $productId;
    #[Rule('required|min:3')]
    public string $name = '';
    #[Rule('required|min:3')]
    public string $description = '';
    #[Rule('required|exists:categories,id', as: 'category')]
    public array $category_id;
    public Collection $categories;

    public function mount(Product $product): void
    {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category_id = [];
        foreach ($product->categories()->allRelatedIds() as $ids){
            $this->category_id[] = $ids;
        }
        $this->categories = Category::pluck('name', 'id');
    }

    public function save(): void
    {
        $this->validate();

        $product = Product::findOrFail($this->productId);
        $product->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $product->categories()->sync($this->category_id);

        $this->redirect('/products');
    }

    public function render()
    {

        return view('liveware.products-edit');
    }
}
