<?php

namespace App\Livewire\Admin\Products;

use App\Livewire\Users\Products\Forms\ProductsForm;
use App\Models as Models;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public ProductsForm $form;
    public Collection $categories;
    public Collection $colors;

    public function mount(): void
    {
        $this->categories = Models\Category::all();
        $this->colors = Models\Color::all();
    }

    public function save(): void
    {
        $this->form->save();
        session()->flash('message','Your product successfully created!');
        $this->redirect('/admin/products');
    }

    public function render()
    {
        return view('livewire.admin.products.create')->layout('layouts.admin');
    }
}
