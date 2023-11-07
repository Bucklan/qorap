<?php

namespace App\Enums\Product;

enum Type: int
{
    case ACTIVE = 1;
    case NOT_ACTIVE = 2;
    case ARCHIVE = 3;

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'ACTIVE',
            self::NOT_ACTIVE => 'NOT_ACTIVE',
            self::ARCHIVE => 'ARCHIVE',
        };
    }
}