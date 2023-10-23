<?php

namespace App\Providers;

use App\Repositories as Repositories;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public array $bindings = [
        Repositories\Interface\EloquentRepositoryInterface::class => Repositories\BaseRepository::class,
        Repositories\Interface\UserRepositoryInterface::class => Repositories\UserRepository::class
    ];
}
