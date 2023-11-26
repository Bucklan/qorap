<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'city_id',
    ];
}
