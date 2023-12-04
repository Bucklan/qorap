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
        if ($value === self::ONLINE) {
            return 'online market';
        }

        if ($value === self::STORE) {
            return 'store market';
        }

        if ($value === self::ONLINE_AND_STORE) {
            return 'online and store market';
        }

        return parent::getDescription($value);
    }
}