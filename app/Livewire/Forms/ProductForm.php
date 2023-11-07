<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProductForm extends Form
{
    #[Rule('required|min:5')]
    public string $title = '';

    #[Rule('required|min:5')]
    public string $body = '';

    public function save(): void
    {
        Product::create($this->all());

        $this->reset('title', 'body');
    }
}
