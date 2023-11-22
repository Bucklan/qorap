<?php

namespace App\Liveware\User\Products;

use App\Liveware\User\Products\Forms\ProductsForm;
use App\Models as Models;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreate extends Component
{
    use WithFileUploads;
    public ProductsForm $form;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Models\Category::pluck('name', 'id');
    }

    public function save(): void
    {
        $this->form->save();
        session()->flash('message','Your product successfully created!');
        $this->redirect('/products');
    }

    public function render(): View
    {
        return view('liveware.products.create')->layout('layouts.app');
    }
}
