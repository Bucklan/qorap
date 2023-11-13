<?php

namespace App\Liveware;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;

class EditProduct extends Component
{
    public ProductForm $form;
    public function mount(Product $product){
        $this->form->setProduct($product);
    }

    public function update(): void
    {
        $this->validate();

        $this->form->update();
    }
    public function render()
    {
        return view('liveware.edit-product');
    }
}
