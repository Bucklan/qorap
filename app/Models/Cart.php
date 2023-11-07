<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    use HasFactory;

    protected $table = 'cart';
    protected $fillable = [
        'product_id',
        'user_id',
        'city_id',
        'quantity',
        'price',
    ];
}
