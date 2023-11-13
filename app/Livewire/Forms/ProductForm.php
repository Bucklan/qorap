<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductForm extends Form
{

    public ?Product $product;
    #[Rule('required|min:5')]
    public string $title = '';
    #[Rule('required|min:5')]
    public string $body = '';
    public function setProduct(Product $product): void
    {
        $this->product = $product;

        $this->title = $product->title;

        $this->body = $product->body;
    }
    public function save(): void
    {
        Product::create($this->all());

        $this->reset('title', 'body');
    }
    public function update(){
        $this->post->update($this->all());
    }
}
