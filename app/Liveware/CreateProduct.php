<?php

namespace App\Liveware;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateProduct extends Component
{
   public ProductForm $form;

    public bool $success = false;
    public function save()
    {
        $this->validate();

        $this->form->save();

        $this->success = true;

    }

    public function render()
    {
        return view('liveware.create-product');
    }
}
