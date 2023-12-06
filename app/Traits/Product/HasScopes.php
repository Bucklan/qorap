<?php

namespace App\Traits\Product;

use App\Enums\Product\Type;
use Illuminate\Database\Eloquent\Builder;


trait HasScopes
{
    public function scopeGetCategory(Builder $query, int $category_id): void
    {
        $query->whereHas('categories', function (Builder $query) use ($category_id) {
            $query->whereIn('category_id', $category_id);
        });
    }

    public function scopeWherePriceBetween(Builder $query, int $from, int $to): ?Builder
    {
        return $query->whereBetween('price', [$from, $to]);
    }

    public function scopeWhereNameAndDescription(Builder $query, string $searchText): ?Builder
    {
        return $query->where('name', 'like', '%' . $searchText . '%')
            ->orWhere('description', 'like', '%' . $searchText . '%');
    }

    public function scopeWhereProductType(Builder $query): ?Builder
    {
        return $query->where('type', Type::ACTIVE);
    }
}