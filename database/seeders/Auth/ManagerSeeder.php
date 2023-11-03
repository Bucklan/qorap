<?php

namespace Database\Seeders\Auth;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums as Enums;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->manager()->create();

        $user->givePermissionTo([
            Enums\User\Permission::DASHBOARD,
            Enums\User\Permission::ORDERS,
            Enums\User\Permission::CLIENTS,
            Enums\User\Permission::MANAGERS,
            Enums\User\Permission::CATEGORIES,
            Enums\User\Permission::PRODUCTS,
            Enums\User\Permission::CITIES,
            Enums\User\Permission::DELIVERIES,
        ]);
    }
}
