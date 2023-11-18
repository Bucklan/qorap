<?php

namespace Database\Seeders;

use App\Enums\User\Permission as PermissionEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Enums\User\Role as RoleEnum;

class RoleSeeder extends Seeder
{
private array $roles = [
    ['name' => RoleEnum::USER],
    ['name' => RoleEnum::MANAGER],
    ['name' => RoleEnum::ADMIN],
    ['name' => RoleEnum::PARTNER],
];


    public function run()
    {
        foreach ($this->roles as $roles){
            Role::create($roles);
        }

    }
}
