<?php

namespace App\Livewire\Frontend\Profile;

use Livewire\Component;

class Index extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.frontend.profile.index');
    }
}
