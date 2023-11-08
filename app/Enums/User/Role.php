<?php

namespace App\Enums\User;


enum Role: string
{
    case USER = 'USER';
    case MANAGER = 'MANAGER';
    case ADMIN = 'ADMIN';
    case PARTNER = 'PARTNER';


    public function label(): string
    {
        return match ($this) {
            self::USER => 'User',
            self::MANAGER => 'Manager',
            self::ADMIN => 'Admin',
            self::PARTNER => 'Partner',
        };
    }
}
