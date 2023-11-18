<?php

namespace Database\Seeders;

use App\Enums\User\Permission as PermissionEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private array $permissions = [
        ['name' => PermissionEnum::CITIES],
        ['name' => PermissionEnum::ADDRESSES],
        ['name' => PermissionEnum::COMPANIES],
        ['name' => PermissionEnum::CATEGORIES],
        ['name' => PermissionEnum::PRODUCTS],
        ['name' => PermissionEnum::COLORS],
        ['name' => PermissionEnum::ORDERS],
        ['name' => PermissionEnum::CART],
        ['name' => PermissionEnum::DASHBOARD],
        ['name' => PermissionEnum::CLIENTS],
        ['name' => PermissionEnum::MANAGERS],
        ['name' => PermissionEnum::ProductStatuses],
    ];

    public function run()
    {
        foreach ($this->permissions as $permission) {
            Permission::create($permission);
        }
    }
}
