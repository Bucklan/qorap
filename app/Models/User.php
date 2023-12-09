<?php

namespace App\Models;
use App\Enums\User\Role;
use App\Traits\User\HasScopes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


/**
 * @method static hasRoleIsUser()
 * @property $shop
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory,
        SoftDeletes, HasRoles,HasScopes;

    protected $guarded = [
        'id',
        'updated_at',
        'created_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
    ];

    public function isLoginBlocked(): bool
    {
        return $this->login_blocked_at != null;
    }

    public function shop(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Shop::class);
    }
    public function address(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Address::class);
    }
    /*
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function carts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class);
    }
    */

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAvatarAttribute(): string
    {
        return $this->getFirstMediaUrl('avatars') ?? asset('assets/images/avatars/1.jpg');
    }


    public function getIsVerifiedAttribute(): bool
    {
        return $this->email_verified_at != null;
    }


}