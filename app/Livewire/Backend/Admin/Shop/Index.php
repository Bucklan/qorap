<?php

namespace App\Livewire\Backend\Admin\Shop;

use Livewire\Component;

class Index extends Component
{
    public $shops;

    public function mount()
    {
        $this->shops = \App\Models\Shop::all();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.admin.shops.index')
            ->layout('layouts.admin');
    }
}
