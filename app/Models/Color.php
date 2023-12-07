<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @method static withCount(string $string)
 */
class Color extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = ['name'];

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_color');
    }
}
