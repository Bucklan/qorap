<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations as Relations;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'addressable_type',
        'addressable_id',
        'city_id',
        'street',
        'building',
        'apartment',
    ];

    public function city(): Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function addressable(): Relations\MorphTo
    {
        return $this->morphTo();
    }

    public function shop(): Relations\HasOne
    {
        return $this->hasOne(Shop::class);
    }
}
