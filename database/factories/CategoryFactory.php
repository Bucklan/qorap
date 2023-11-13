<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => json_encode([]),
            'parent_id' => null,
        ];
    }
}
