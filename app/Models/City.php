<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations as Relations;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function addresses(): Relations\HasMany
    {
        return $this->hasMany(Address::class);
    }
}
