<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShopFactory extends Factory
{
    protected $model = Shop::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'number_of_stores' => $this->faker->randomNumber(),
            'social_link' => $this->faker->words(),
            'status' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'city_id' => $this->faker->randomNumber(),
            'address_id' => $this->faker->address(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
