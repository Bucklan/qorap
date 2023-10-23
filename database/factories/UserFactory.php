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
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }



    public function manager(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'manager',
                'email' => 'manager@fixbox.kz',
                'password' => 'M5E76*^EHr3vb%Xq&KAatvKwT7Jmrsvs',
            ];
        })->afterCreating(function (User $user){
            $user->assignRole(Role::MANAGER);
        });
    }

    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'ADMIn',
                'email' => 'admin@fixbox.kz',
                'password' => 'M5E76*^EHr3vb%Xq&KAatvKwT7Jmrsvs',
            ];
        })->afterCreating(function (User $user){
            $user->assignRole(Role::ADMIN);
        });
    }
}
