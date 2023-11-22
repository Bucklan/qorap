<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {

        $products = Product::factory()->count(20)->create();
        foreach ($products as $product) {
            $product['old_price'] = $product['price'] + 1000;
        }
    }
}
