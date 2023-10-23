<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }
    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function giftsRated()
    {
        return $this->belongsToMany(Gift::class, 'rating')
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function giftsLike()
    {
        return $this->belongsToMany(Gift::class, 'like')
            ->withPivot('like')
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function giftsBought(){
        return $this->belongsToMany(Gift::class,'cart')
            ->withTimestamps()
            ->withPivot('number','status');
    }
    public function giftsWithStatus($status){
        return $this->belongsToMany(Gift::class,'cart')
            ->wherePivot('status',$status)
            ->withTimestamps()
            ->withPivot('number','status');
    }
}
