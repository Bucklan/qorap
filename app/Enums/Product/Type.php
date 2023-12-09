<?php

namespace App\Enums\Product;

use BenSampo\Enum\Enum;

class Type extends Enum
{
    const ACTIVE = 1;
    const NOT_ACTIVE = 2;
    const ARCHIVE = 3;

    public static function getDescription($value): string
    {
       return match ($value) {
            self::ACTIVE => 'active',
            self::NOT_ACTIVE => 'not active',
            self::ARCHIVE => 'archive',
            default => 'unknown',
        };
    }
}