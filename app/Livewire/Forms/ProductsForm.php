<?php

namespace App\Livewire\Forms;

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
    #[Rule('required|integer|min:50')]
    public int $price = 0;
    #[Rule('required|min:1')]
    public int $quantity = 0;
    #[Rule('required|array', as: 'category')]
    public array $productCategories = [1];
    #[Rule('required|array')]
    public array $images;

//    public function updated($images)
//    {
//        $this->validateOnly($images);
//    }


    public function setProducts(Models\Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
//        $this->images = $product->getMedia('products')->pluck('id')->toArray();
        $this->productCategories = $product->categories()->allRelatedIds()->toArray();
    }

    public function save(): void
    {
        $this->validate();
        $product = Models\Product::create($this->all());
        $product->categories()->sync($this->productCategories);
        foreach ($this->images as $image){
            $product->addMedia($image)->toMediaCollection('products');
        }
    }

    public function update(): void
    {
        $this->validate();
        $this->product->update($this->all());
        $this->product->categories()->sync($this->productCategories);
    }
}
