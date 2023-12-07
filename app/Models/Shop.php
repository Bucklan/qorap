<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations as Relations;
use Spatie\Translatable\HasTranslations;

class Shop extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function address(): Relations\BelongsTo
    {
        return $this->belongsTo(Address::class,'id','addressable_id')
            ->where('addressable_type', self::class)
            ->where('id', $this->address_id);
    }

    public function products(): Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getStatusClass(): string
    {
        return match ($this->status) {
            'online market' => 'hot',
            'store market' => 'best',
            'online and store market' => 'sale',
            default => 'new',
        };
    }
}
