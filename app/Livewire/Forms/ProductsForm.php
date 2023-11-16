<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models as Models;

class ProductsForm extends Form
{
    public ?Models\Product $product;
    #[Locked]
    public int $productId;
    #[Rule('required|min:3')]
    public string $name = '';
    #[Rule('required|min:3')]
    public string $description = '';
    #[Rule('required|array|exists:categories,id' , as: 'category')]
    public array $category_id;

    public function setProducts(Models\Product $product): void
    {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category_id = [];
        foreach ($product->categories()->allRelatedIds() as $ids){
            $this->category_id[] = $ids;
        }
    }
    public function save(): void
    {
        $this->validate();
        $product = Models\Product::create($this->only(['name', 'description']));
        foreach ($this->category_id as $categoryId) {
            $category = Models\Category::find($categoryId);

            if ($category) {
                $category->products()->attach($product->id);
            }
        }
    }
    public function update(){
    $this->validate();
        $product = Models\Product::findOrFail($this->productId);
        $product->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $product->categories()->sync($this->category_id);
    }
}
