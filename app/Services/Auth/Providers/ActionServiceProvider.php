<?php

namespace App\Services\Auth\Providers;

use App\Services\Auth as Auth;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [
        Auth\Contracts\Register::class => Auth\Actions\Register\RegisterAction::class,
    ];
}
