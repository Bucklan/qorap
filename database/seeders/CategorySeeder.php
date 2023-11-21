<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private array $categories = [
        0 => '{"kz":"gul","en":"rose"}',
        1 => '{"kz":"siylyq","en":"gift"}',
        2 => '{"kz":"qorap","en":"box"}'
    ];
    public function run(): void
    {
        foreach ($this->categories as $value => $category) {
            Category::query()->create([
                'name' => $category,
                'parent_id' => null,
            ]);
        }
    }
}
