<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    public function definition(): array
    {
        $faker = $this->faker->numberBetween(500, 99999);
        return [
            'name'        => $this->faker->name(),
            'description' => $this->faker->text(50),
            'price'       => $faker,
            'old_price'   => $faker+1000,
            'quantity'    => $this->faker->numberBetween(1, 100),
        ];
    }
}
