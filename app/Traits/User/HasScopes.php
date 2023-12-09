<?php

namespace App\Traits\User;

use App\Enums\User\Role;
use Illuminate\Database\Eloquent\Builder;

trait HasScopes
{
    public function scopeHasRoleIsUser(Builder $query): bool
    {
        return $query->hasRole(Role::USER);
    }
        public function scopeHasRoleIsAdmin(Builder $query): bool
    {
        return $query->hasRole(Role::ADMIN);
    }
        public function scopeHasRoleIsSuperAdmin(Builder $query): bool
    {
        return $query->hasRole(/*Role::SUPER_ADMIN*/);
    }
    public function scopeHasRoleIsShopOwner(Builder $query): bool
    {
        return $query->hasRole(/*Role::SHOP_OWNER*/);
    }

    public function scopeHasRoleIsShopManager(Builder $query): bool
    {
        return $query->hasRole(/*Role::SHOP_MANAGER*/);
    }

    public function scopeHasRoleIsShopStaff(Builder $query): bool
    {
        return $query->hasRole(/*Role::SHOP_STAFF*/);
    }


}