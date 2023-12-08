<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations as Relations;
use Spatie\Translatable\HasTranslations;
use \Staudenmeir\LaravelAdjacencyList\Eloquent as AdjacencyList;

class Category extends Model
{
    use HasFactory,
        HasTranslations,
        AdjacencyList\HasRecursiveRelationships;

    public array $translatable = ['name'];

    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected $casts = [

    ];

    public function products(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_category');
    }
}
