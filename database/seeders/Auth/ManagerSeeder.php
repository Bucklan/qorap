<?php

namespace Database\Seeders\Auth;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            Enums\User\Permission::COURIERS,
            Enums\User\Permission::CATEGORIES,
            Enums\User\Permission::GENRES,
            Enums\User\Permission::PRODUCTS,
            Enums\User\Permission::CITIES,
            Enums\User\Permission::NOTIFICATIONS,
            Enums\User\Permission::BANNERS,
            Enums\User\Permission::SETTINGS,
            Enums\User\Permission::PROMOCODES,
            Enums\User\Permission::HELP_SECTIONS,
            Enums\User\Permission::CONTACTS,
            Enums\User\Permission::BONUSES,
            Enums\User\Permission::DELIVERIES,
        ]);
    }
}
