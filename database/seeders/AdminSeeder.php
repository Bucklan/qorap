<?php

namespace Database\Seeders;

use App\Enums as Enums;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(): void
    {
        $user = User::factory()->admin()->create();
        $user->assignRole(Enums\User\Role::ADMIN->value);

        $user->givePermissionTo([
            Enums\User\Permission::CITIES->label(),
            Enums\User\Permission::ADDRESSES->label(),
            Enums\User\Permission::COMPANIES->label(),
            Enums\User\Permission::CATEGORIES->label(),
            Enums\User\Permission::PRODUCTS->label(),
            Enums\User\Permission::COLORS->label(),
            Enums\User\Permission::ORDERS->label(),
            Enums\User\Permission::CART->label(),
            Enums\User\Permission::DASHBOARD->label(),
            Enums\User\Permission::CLIENTS->label(),
            Enums\User\Permission::MANAGERS->label(),
            Enums\User\Permission::ProductStatuses->label(),
        ]);
    }
}
