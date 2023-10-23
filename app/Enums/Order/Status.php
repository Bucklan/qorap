<?php

namespace App\Enums\Order;

enum Status
{
    const CREATED = '1';
    const DELIVERED = '2';
    const CANCELED = '3';
    const COMPLETED = '4';
}
