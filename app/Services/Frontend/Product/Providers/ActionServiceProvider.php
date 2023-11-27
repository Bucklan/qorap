<?php

namespace App\Services\Frontend\Product\Providers;

use App\Services\Frontend\Product as Product;

use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [
        \App\Services\Frontend\Product\Contracts\Filter::class => \App\Services\Frontend\Product\Actions\FilterAction::class,
    ];
}