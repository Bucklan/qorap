<?php

namespace App\Livewire\Backend\Admin\Product;

use App\Models as Models;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public Collection $categories;
    public Collection $colors;

    public function mount(): void
    {
        $this->categories = Models\Category::all();
        $this->colors = Models\Color::all();
    }

    public function save(): void
    {

        session()->flash('message','Your product successfully created!');
        $this->redirect('/admin/products');
    }

    public function render()
    {
        return view('livewire.backend.admin.products.create')
            ->layout('layouts.admin');
    }
}
