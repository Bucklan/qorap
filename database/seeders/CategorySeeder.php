<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            0 => ['kz' => 'Гүл', 'ru' => 'Цветы', 'en' => 'rose'],
            1 => ['kz' => 'Сыйлық', 'ru' => 'Подарок', 'en' => 'gift'],
            2 => ['kz' => 'Қорап', 'ru' => 'Сет', 'en' => 'box'],
        ];

        foreach ($categories as $translation) {
            $category = new Category();
            foreach ($translation as $locale => $value) {
                $category->setTranslation('name', $locale, $value);
            }
            $category->save();
        }
    }
}
