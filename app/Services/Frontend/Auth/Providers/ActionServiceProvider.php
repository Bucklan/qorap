<?php

namespace App\Services\Frontend\Auth\Providers;

use App\Services\Frontend\Auth as Auth;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [
        \App\Services\Frontend\Auth\Contracts\Register::class => \App\Services\Frontend\Auth\Actions\Register\RegisterAction::class,
        \App\Services\Frontend\Auth\Contracts\Login::class => \App\Services\Frontend\Auth\Actions\Login\LoginAction::class,
    ];
}
