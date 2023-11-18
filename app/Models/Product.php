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
    use HasFactory,InteractsWithMedia;

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
        return $this->belongsToMany(Category::class,'product_category');
    }


//    public function scopeGetCategory($query, $categoryId)
//    {
//        return $query->with('categories', function ($query) use ($categoryId) {
//            $query->where('category_id', $categoryId);
//        });
//    }

}
