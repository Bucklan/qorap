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
        if ($value === self::ACTIVE) {
            return 'active';
        }

        if ($value === self::NOT_ACTIVE) {
            return 'not active';
        }

        if ($value === self::ARCHIVE) {
            return 'archive';
        }

        return parent::getDescription($value);
    }
}