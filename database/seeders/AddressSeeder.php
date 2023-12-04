<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
   private array $addresses = [
       [
           'id' => 1,
           'addressable_type' => 'App\Models\Shop',
              'addressable_id' => 1,
                'city_id' => 1,
                'street' => 'Shugyla',
                'building' => '340/3',
                'apartment' => '51',

       ],
       [
           'id' => 2,
           'addressable_type' => 'App\Models\Shop',
           'addressable_id' => 2,
           'city_id' => 1,
           'street' => 'alma city',
           'building' => '4/6',
           'apartment' => '57',

       ],
       [
           'id' => 3,
           'addressable_type' => 'App\Models\Shop',
           'addressable_id' => 3,
           'city_id' => 1,
           'street' => 'tolebi',
           'building' => '59b',
           'apartment' => '34',

       ],
       [
           'id' => 4,
           'addressable_type' => 'App\Models\Shop',
           'addressable_id' => 4,
           'city_id' => 1,
           'street' => 'beregavoi',
           'building' => '123',
           'apartment' => '51',

       ],
   ];
    public function run()
    {
        foreach ($this->addresses as $address) {
            \App\Models\Address::create($address);
        }
    }
}
