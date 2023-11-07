<?php

namespace App\Enums\Order;

enum Status: string
{
    case CREATED = 'CREATED';
    case DELIVERED = 'DELIVERED';
    case CANCELED = 'CANCELED';
    case COMPLETED = 'COMPLETED';

    public function label(): string
    {
        return match ($this) {
            self::CREATED => 'CREATED',
            self::DELIVERED => 'DELIVERED',
            self::CANCELED => 'CANCELED',
            self::COMPLETED => 'COMPLETED'
        };
    }
}
