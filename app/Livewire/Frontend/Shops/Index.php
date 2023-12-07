<?php

namespace App\Livewire\Frontend\Shops;

use Livewire\Component;
use App\Models as Models;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
//public $shopProductCount;

public function mount()
{
//   $this->shopProductCount = Models\Shop::withCount('products')->get();
//   foreach ($this->shopProductCount as $shop){
//       dd($shop->products_count);
//   }
}

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $shops = Models\Shop::withCount('products','address')->paginate(10);
        return view('livewire.frontend.shops.index',compact('shops'))
            ->layout('layouts.app');
    }
}
