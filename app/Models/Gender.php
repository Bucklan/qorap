<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{

    protected $fillable = ['gender_kz','gender_en','gender_ru'];
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
