<?php

namespace App\Livewire\Users\Auth;

use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class Logout extends Component
{

    #[NoReturn] public function mount(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();
        return redirect('/dashboard');
    }
}
