<?php

namespace App\Enums\Shop;

enum Status: string
{
    case ONLINE = "ONLINE";
    case STORE = "IN_STORE";
    case ONLINE_AND_STORE = "ONLINE_AND_STORE";

    public function label(): string
    {
        return match ($this) {
            self::ONLINE => 'Online',
            self::STORE => 'Store',
            self::ONLINE_AND_STORE => 'Online and Store',
        };
    }
}