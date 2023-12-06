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


/**
 * @method static hasRoleIsUser()
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory,
        SoftDeletes, HasRoles;

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
        'google_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
    ];

    public function scopeHasRoleIsUser(Builder $query): bool
    {
        return $query->hasRole(Role::USER);
    }

    public function isLoginBlocked(): bool
    {
        return $this->login_blocked_at != null;
    }
}