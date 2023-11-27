<?php

namespace App\Livewire\Users\Products\Forms;

use App\Models as Models;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductsForm extends Form
{

    public ?Models\Product $product;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'short_description' => 'required|min:3',
        'price' => 'required|integer|min:50',
        'quantity' => 'required|min:1',
        'productCategories' => 'required|array',
        'productCategories.*' => 'required|integer|exists:categories,id',
        'images' => 'required|array',
        'images.*' => 'required|image',
        'productColors' => 'required|array',
        'productColors.*' => 'required|integer|exists:colors,id',
    ];
    public string $name = '';
    public string $description = '';
    public string $short_description = '';
    public int $price = 0;
    public int $quantity = 0;
    public array $productCategories = [];
    public array $productColors = [];
    public array $images;




    public function setProducts(Models\Product $product): void
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->images = $product->getMedia('products')->pluck('id')->toArray();
        $this->productCategories = $product->categories()->allRelatedIds()->toArray();
        $this->productColors = $product->colors()->allRelatedIds()->toArray();
    }

    public function save(): void
    {
//        dd($this->productCategories);
        $this->validate();
        $product = Models\Product::create($this->all());
        $product->categories()->sync($this->productCategories);
        $product->colors()->sync($this->productColors);
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
