<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategory extends Seeder
{

    public function run()
    {
        $products = Product::get();
        $categories = Category::get();
        foreach ($products as $product) {
                $product->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
