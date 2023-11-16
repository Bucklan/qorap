<?php

namespace App\Liveware;

use App\Livewire\Forms\ProductsForm;
use App\Models\Category;
use Illuminate\Support\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Product;

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
        $this->redirect('/products');
    }

    public function render()
    {
        return view('liveware.products-create');
    }
}
