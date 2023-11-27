<?php

namespace App\Services\Frontend\Product\Actions;

use App\Models\Product;
use App\Services\Frontend\Product\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class FilterAction implements Filter
{
    public function execute(string $searchQuery, ?array $searchCategory, ?int $fromPrice, ?int $toPrice, int $paginate)
    {
         $products = Product::with('categories')
            ->when($searchQuery !== '', fn(Builder $query) => $query->where('name', 'like', '%' . $searchQuery . '%'))
            ->firstWhere('description', 'like', '%' . $searchQuery . '%');
        /*->when(count($searchCategory) > 0, function ($query) use ($searchCategory) {
            $query->whereHas('categories', function ($query) use ($searchCategory) {
                $query->whereIn('category_id', $searchCategory);
            });
        })
        ->when($fromPrice || $toPrice, fn(Builder $query) => $query->wherePriceBetween($fromPrice, $toPrice));*/

        return $products->paginate($paginate);
    }
}