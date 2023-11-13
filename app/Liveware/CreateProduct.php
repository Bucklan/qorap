<?php

namespace App\Liveware;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateProduct extends Component
{
    #[Rule('required|min:5')]
    public string $name = '';
    #[Rule('required|min:5')]
    public string $description = '';

    public bool $success = false;


    public function save(): void
    {
        $validated = $this->validate();
        Product::create($validated);
        $this->reset('name','description');
        $this->success = true;
    }

    public function render()
    {
        return view('liveware.create-product');
    }
}
