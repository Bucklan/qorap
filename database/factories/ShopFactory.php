<?php

namespace Database\Factories;

use App\Enums\Shop\Status;
use App\Models\City;
use App\Models\Shop;
use App\Models\User;
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
            'social_link' => '{"facebook": "https://www.facebook.com/"}',
            'status' => Status::getDescription($this->faker->randomElement(Status::getValues())),
            'user_id' => User::all()->random()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
