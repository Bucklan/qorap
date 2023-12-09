<?php

namespace App\Livewire\Frontend\Elements;

use App\Models\City;
use Livewire\Component;

class Navbar extends Component
{
    public $cities;
    public function mount(): void
    {
        $this->cities = City::select('name')->get();
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.frontend.elements.navbar')->layout('layouts.app');
    }
}
