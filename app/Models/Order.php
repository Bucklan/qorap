<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = [
        'user_id',
        'city_id',
        'amount',
        'status',
        'ordered_at',
        'declined_at',
        'confirmed_at',
        'completed_at',
        'retrieved_at',
    ];
}
