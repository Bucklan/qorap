<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models as Models;

class ProductsForm extends Form
{
    public ?Models\Product $product;
    #[Rule('required|min:3')]
    public string $name = '';
    #[Rule('required|min:3')]
    public string $description = '';
    #[Rule('required|array', as: 'category')]
    public array $productCategories = [];

    public function setProducts(Models\Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->productCategories = $product->categories()->allRelatedIds()->toArray();
    }

    public function save(): void
    {
        $this->validate();
        $product = Models\Product::create($this->all());
        $product->categories()->sync($this->productCategories);
    }

    public function update(): void
    {
        $this->validate();
        $this->product->update($this->all());
        $this->product->categories()->sync($this->productCategories);
    }
}
