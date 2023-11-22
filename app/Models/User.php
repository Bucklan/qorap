<?php

namespace App\Models;
use App\Enums\User\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,
        SoftDeletes,HasRoles;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'gender',
        'year_of_birth',
        'email_verified_at',
        'login_blocked_at',
        'password_changed_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
    ];
public function scopeHasRoleIsUser(Builder $query,string $email): bool
{
    $query = $query->where('email', $email)->first();
    return $query->hasRole(Role::USER);
}
}
