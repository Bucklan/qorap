<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'name'        => $this->faker->name(),
            'description' => $this->faker->text(50),
            'price'       => $this->faker->randomDigitNotNull(),
            'quantity'    => $this->faker->numberBetween(1, 100),
        ];
    }
}
