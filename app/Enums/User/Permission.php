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
}