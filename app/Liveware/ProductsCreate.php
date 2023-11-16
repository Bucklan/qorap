<?php

namespace App\Liveware;

use App\Livewire\Forms\ProductsForm;
use App\Models as Models;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ProductsCreate extends Component
{
    public ProductsForm $form;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Models\Category::pluck('name', 'id');
    }

    public function save(): void
    {
        $this->form->save();
        $this->redirect('/products');
    }

    public function render(): View
    {
        return view('liveware.products-create');
    }
}
