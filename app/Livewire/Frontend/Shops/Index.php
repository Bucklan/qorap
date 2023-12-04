<?php

namespace App\Livewire\Frontend\Shops;

use Livewire\Component;
use App\Models as Models;
class Index extends Component
{
    public $shops = [];

    public function mount(): void
    {
        $this->shops = Models\Shop::all();
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.frontend.shops.index')
            ->layout('layouts.app');
    }
}
