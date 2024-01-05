<?php

namespace App\Livewire\Backend\Admin;

use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{
public $products_count;

    public function mount()
    {
        $this->products_count = Product::count();
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.admin.dashboard')
            ->layout('layouts.admin');
    }
}