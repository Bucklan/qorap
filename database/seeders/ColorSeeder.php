<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            1 => ['kz' => 'Қызғылт', 'ru' => 'Красный', 'en' => 'Red'],
            2 => ['kz' => 'Қара', 'ru' => 'Черный', 'en' => 'Black'],
            3 => ['kz' => 'Ақ', 'ru' => 'Белый', 'en' => 'White'],
            4 => ['kz' => 'Сары', 'ru' => 'Желтый', 'en' => 'Yellow'],
            5 => ['kz' => 'Көк', 'ru' => 'Синий', 'en' => 'Blue'],
            6 => ['kz' => 'Жасыл', 'ru' => 'Зеленый', 'en' => 'Green'],
        ];

        foreach ($colors as $translation) {
            $color = new Color();
            foreach ($translation as $locale => $value) {
                $color->setTranslation('name', $locale, $value);
            }
            $color->save();
        }
    }
}
