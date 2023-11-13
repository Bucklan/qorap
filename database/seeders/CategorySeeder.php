<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private $categories = [
        [
            "name" => [
                "id" => 1,
                "kz" => 'kazakh',
                "en" => "english"
            ],
            "parent_id" => null,
        ],
        [
            "name" => [
                "id" => 2,
                "kz" => 'kazakh',
                "en" => "english"
            ],
            "parent_id" => null,
        ],
    ];
    public function run()
    {
       foreach ($this->categories as $category){
           Category::create($category);
       }
    }
}
