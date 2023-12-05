<?php

namespace App\Services\Frontend\Product\Contracts;

interface Filter
{
public function execute(string $searchQuery,
                        array $searchCategory,
                        ?int $fromPrice,
                        ?int $toPrice,
                        int $paginate
);
}