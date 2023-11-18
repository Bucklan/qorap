<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Enums as Enums;

class RolePermissionSeeder extends Seeder
{

    public function run()
    {
        $roleAdmin = Role::where('name',Enums\User\Role::ADMIN)->first();

        //for Admin
        foreach (Permission::all() as $permission){
            $permission->assignRole($roleAdmin);
        }


    }

}
