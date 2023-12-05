<?php

namespace App\Services\Frontend\Product\Actions;

use App\Models\Product;
use App\Services\Frontend\Product\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterAction implements Filter
{
    public function execute(string $searchQuery, ?array $searchCategory, ?int $fromPrice, ?int $toPrice,int $paginate)
    {

    }
}