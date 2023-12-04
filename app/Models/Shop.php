<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations as Relations;
use Spatie\Translatable\HasTranslations;

class Shop extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'phone',
        'number_of_stores',
        'social_link',
        'status',
        'user_id',
        'address_id',
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
        switch ($this->status) {
            case 'online market':
                return 'hot';
                break;
            case 'store market':
                return 'best';
                break;
            case 'online and store market':
                return 'sale';
                break;
            default:
                return 'new';
                break;
        }
    }
}
