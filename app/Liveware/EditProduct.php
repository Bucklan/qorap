<?php

namespace App\Liveware;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditProduct extends Component
{
    public ?Product $product;
    #[Rule('required|min:5')]
    public string $title = '';
    #[Rule('required|min:5')]
    public string $body = '';

    public bool $success = false;

    public function mount(Product $product): void
    {
        $this->product = $product;

        $this->title = $product->title;

        $this->body = $product->body;
    }
    public function update(): void
    {
        $validated = $this->validate();

        $this->product->update($validated);

        $this->reset('title','body');
        $this->success = true;
    }
    public function render()
    {
        return view('liveware.edit-product');
    }
}
