<?php

namespace App\Models;

use App\Traits\Product\HasScopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations as Relations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Product
 *
 * @property mixed $colors
 * @property mixed $categories
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $short_description
 * @property int|null $quantity
 * @property int|null $type
 * @property int|null $price
 * @property int|null $old_price
 * @property int|null $shop_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $categories_count
 * @property-read int|null $colors_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Shop|null $shop
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static Builder|Product getCategory($searchCategory)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereNameAndDescription(string $searchQuery)
 * @method static Builder|Product whereOldPrice($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product wherePriceBetween(int $fromPrice, int $toPrice)
 * @method static Builder|Product whereQuantity($value)
 * @method static Builder|Product whereShopId($value)
 * @method static Builder|Product whereShortDescription($value)
 * @method static Builder|Product whereType($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia,HasScopes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function categories(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class,
            'product_category',
            'product_id',
            'category_id');
    }

    public function colors(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }


    public function shop(): Relations\BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

//    protected function price(): Attribute
//    {
//        return Attribute::make(
//            get: fn ($price) => $price / 100,
//            set: fn ($price) => $price * 100,
//        );
//    }

    public function ratings(): Relations\HasMany
    {
        return $this->hasMany(Rating::class);
    }


    public function cart(){
        return $this->belongsToMany(Cart::class);
    }
}
