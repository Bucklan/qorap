<?php

namespace App\Livewire\Backend\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class Delete extends Component
{


    public function destroy(Product $product): void
    {
        $product->delete();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.admin.product.delete');
    }
}
