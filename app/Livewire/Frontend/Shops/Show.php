<?php

namespace App\Livewire\Frontend\Shops;

use App\Models\Shop;
use Livewire\Component;

class Show extends Component
{
    public $shop;
    public function mount(Shop $shop): void
    {
        $this->shop = $shop;
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.frontend.shops.show')->layout('layouts.app');
    }
}
