<?php

namespace App\Http\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateProduct extends Component
{
    public ProductForm $form;

    public bool $success = false;
    public function save(): void
    {
        $this->validate();
        Product::create([
            'title' => $this->form->title,
            'body' => $this->form->body,
        ]);

        $this->success = true;

        $this->reset('form.title', 'form.body');
    }


}
