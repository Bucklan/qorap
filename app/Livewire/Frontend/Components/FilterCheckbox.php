<?php

namespace App\Livewire\Frontend\Components;

use App\Livewire\Frontend\Products\Index;
use Livewire\Component;

class FilterCheckbox extends Component
{
   public $elements;
   public $searchElement;
   public $searchModel;
   public $nameElement;
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.frontend.components.filter-checkbox')
            ->layout('layouts.app');
    }
}
