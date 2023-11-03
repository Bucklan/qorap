<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Show extends Component
{
    public int $count = 1;

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.product.show', ['count' => $this->count]);
    }

}
