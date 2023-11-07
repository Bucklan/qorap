<?php

namespace App\Http\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;

class EditProduct extends Component
{
    public ProductForm $form;

    public function mount(Product $product): void
    {
        $this->form->setProduct($product);
    }

    public function update(): void
    {
        $this->validate();

        $this->form->update();
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}