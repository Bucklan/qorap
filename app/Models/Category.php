<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations as Relations;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected $casts = [

    ];

    public function parent(): Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_category');
    }
}
