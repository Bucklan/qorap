<?php

namespace Database\Factories;

use App\Enums\User\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

            return [
                'name' => fake()->name(),
                'surname' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => 'client123', // password
                'remember_token' => Str::random(10),
            ];

    }



    public function manager(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'manager',
                'surname' => 'manager',
                'email' => 'manager@kz',
                'password' => 'manager123',
            ];
        })/*->afterCreating(function (User $user){
            $user->assignRole(Role::MANAGER->label());
        })*/;
    }

    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Admin',
                'surname' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin123',
            ];
        })/*->afterCreating(function (User $user){
            $user->assignRole(Role::ADMIN->label());
        })*/;
    }
}
