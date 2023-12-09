<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    private array $cities = [
        0 => ["kz" => "Алматы", "ru" => "Алмата", "en" => "Almaty"],
        1 => ["kz" => "Астана", "ru" => "Астана", "en" => "Astana"],
        2 => ["kz" => "Ақтау", "ru" => "Актау", "en" => "Aktau"],
        3 => ["kz" => "Ақтобе", "ru" => "Актобе", "en" => "Aktobe"],
        4 => ["kz" => "Атырау", "ru" => "Атырау", "en" => "Atyrau"],
        5 => ["kz" => "Қарағанды", "ru" => "Караганда", "en" => "Karaganda"],
        6 => ["kz" => "Көкшетау", "ru" => "Кокшетау", "en" => "Kokshetau"],
        7 => ["kz" => "Қостанай", "ru" => "Костанай", "en" => "Kostanay"],
        8 => ["kz" => "Қызылорда", "ru" => "Кызылорда", "en" => "Kyzylorda"],
        9 => ["kz" => "Павлодар", "ru" => "Павлодар", "en" => "Pavlodar"],
        10 => ["kz" => "Петропавл", "ru" => "Петропавл", "en" => "Petropavl"],
        11 => ["kz" => "Семей", "ru" => "Семей", "en" => "Semey"],
        12 => ["kz" => "Талдықорған", "ru" => "Талдыкорган", "en" => "Taldykorgan"],
        13 => ["kz" => "Тараз", "ru" => "Тараз", "en" => "Taraz"],
        14 => ["kz" => "Түркістан", "ru" => "Туркестан", "en" => "Turkestan"],
        15 => ["kz" => "Шымкент", "ru" => "Шымкент", "en" => "Shymkent"],
    ];

    public function run(): void
    {
        foreach ($this->cities as $translation) {
            $city = new City();
            foreach ($translation as $locale => $value) {
                $city->setTranslation('name', $locale, $value);
            }
            $city->save();
        }
    }
}
