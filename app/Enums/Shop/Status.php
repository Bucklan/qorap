<?php

namespace App\Enums\Shop;

use BenSampo\Enum\Enum;

class Status extends Enum
{
    const ONLINE = "online market";
    const STORE = "store market";
    const ONLINE_AND_STORE = "online and store market";

    public static function getDescription($value): string
    {
        return match ($value) {
            self::ONLINE => 'online market',
            self::STORE => 'store market',
            self::ONLINE_AND_STORE => 'online and store market',
            default => 'unknown',
        };
    }
}