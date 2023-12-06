<?php

namespace App\Livewire\Frontend\Components;

use App\Livewire\Frontend\Products\Index;
use Livewire\Component;

class CategoryFilterCheckbox extends Component
{
   public Index $index;
   public $categories;
    public function render()
    {
        return view('livewire.frontend.components.category-filter-checkbox')
            ->layout('layouts.app');
    }
}
