<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations as Relations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'short_description',
        'quantity',
        'type',
        'price',
        'old_price',
        'shop_id',
    ];

    public function categories(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }


//    public function scopeGetCategory($query, $categoryId)
//    {
//        return $query->with('categories', function ($query) use ($categoryId) {
//            $query->where('category_id', $categoryId);
//        });
//    }

    public function scopeWherePriceBetween(Builder $query, int $fromPriceByFilter, int $toPriceByFilter): ?Builder
    {
        return $fromPriceByFilter ||
        $toPriceByFilter &&
        $fromPriceByFilter <= $toPriceByFilter
            ? $query
                ->whereBetween('price', [$fromPriceByFilter, $toPriceByFilter])
            : null;
    }
    public function allFiltersForProducts(string $searchQuery, array $searchCategory,$fromPrice, $toPrice){
        if($this->categories === null) {
            // Handle the case when $this->categories is null (e.g., initialize it, throw an error, etc.)
            // You can add your logic here based on how you want to handle the null case.
            // For example:
            // throw new Exception('$this->categories is null. Please initialize it before calling this method.');
        }

        return $this->categories
            ->when($searchQuery !== '', fn(Builder $query)
            => $query->where('name', 'like', '%' . $searchQuery . '%'))
            ->firstWhere('description', 'like', '%' . $searchQuery . '%')
           /* ->when(count($searchCategory) > 0, function ($query) use ($searchCategory) {
                $query->whereHas('categories', function ($query) use ($searchCategory) {
                    $query->whereIn('category_id', $searchCategory);
                });
            })
            ->when($fromPrice || $toPrice, fn(Builder $query) => $query->wherePriceBetween($fromPrice, $toPrice))*/;
    }

}
