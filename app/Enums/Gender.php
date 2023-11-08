<?php

namespace App\Enums;


enum Gender: int
{
    case MALE = 1;
    case FEMALE = 2;
    case UNKNOWN = 3;

    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::UNKNOWN => 'Unknown',
        };
    }

}
