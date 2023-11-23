<?php

namespace App\View;

use Illuminate\View\Component;

class AppLayout extends Component
{

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Support\Htmlable|string|\Closure|\Illuminate\Contracts\Foundation\Application
    {
        return view('layouts.app');
    }
}
