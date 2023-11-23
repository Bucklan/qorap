<?php

namespace App\Services\User\Auth\Providers;

use App\Services\User\Auth as Auth;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [
        Auth\Contracts\Register::class => Auth\Actions\Register\RegisterAction::class,
        Auth\Contracts\Login::class => Auth\Actions\Login\LoginAction::class,
    ];
}
