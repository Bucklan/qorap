<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'addressable_type' => $this->faker->word(),
            'addressable_id' => $this->faker->randomNumber(),
            'city_id' => $this->faker->randomNumber(),
            'street' => $this->faker->word(),
            'building' => $this->faker->word(),
            'apartment' => $this->faker->word(),
        ];
    }
}
