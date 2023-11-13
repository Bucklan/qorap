<?php

namespace App\Liveware;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateProduct extends Component
{
    #[Rule('required|min:5')]
    public string $title = '';
    #[Rule('required|min:5')]
    public string $body = '';

    public bool $success = false;
    public function save(): void
    {
        $validated = $this->validate();
        Product::create($validated);
        $this->reset('title','body');
        $this->success = true;
    }

    public function render()
    {
        return view('liveware.create-product');
    }
}
