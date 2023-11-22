<?php

namespace App\Liveware\User\Products;

use App\Liveware\User\Products\Forms\ProductsForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;

class ProductsEdit extends Component
{
    public ProductsForm $form;
    public Collection $categories;

    public function mount(Product $product): void
    {
        $this->form->setProducts($product);
        $this->categories = Category::pluck('name', 'id');
    }

    public function save(): void
    {
        $this->form->update();
        session()->flash('message','Your product successfully updated!');
        $this->redirect('/products');
    }

    public function render()
    {
        return view('liveware.products.create')->layout('layouts.app');
    }
}
