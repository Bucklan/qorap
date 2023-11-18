<?php

namespace App\Enums\User;

enum Permission: string
{
    case CITIES = 'Cities';
    case ADDRESSES = 'Addresses';
    case COMPANIES = 'Companies';
    case CATEGORIES = 'Categories';
    case PRODUCTS = 'Products';
    case COLORS = 'Colors';
    case ORDERS = 'Orders';
    case CART = 'Carts';
    case DASHBOARD = 'Dashboard';
    case CLIENTS = 'Clients';
    case MANAGERS = 'Managers';
    case ProductStatuses = 'ProductStatuses';

    public function label(){
        return match ($this){
            self::CITIES => 'Cities',
            self::ADDRESSES => 'Addresses',
            self::COMPANIES => 'Companies',
            self::CATEGORIES => 'Categories',
            self::PRODUCTS => 'Products',
            self::COLORS => 'Colors',
            self::ORDERS => 'Orders',
            self::CART => 'Carts',
            self::DASHBOARD => 'Dashboard',
            self::CLIENTS => 'Clients',
            self::MANAGERS => 'Managers',
            self::ProductStatuses => 'ProductStatuses',
        };
    }
}