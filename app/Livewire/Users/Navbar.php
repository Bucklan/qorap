<?php

namespace App\Livewire\Users;

use App\Models\City;
use Livewire\Component;

class Navbar extends Component
{
    public $cities;
    public function mount(): void
    {
        $this->cities = City::get();
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.users.navbar')->layout('layouts.app');
    }
}
