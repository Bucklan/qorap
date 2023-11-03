<?php

namespace App\Enums\User;

enum Permission
{
    const DASHBOARD = 'DASHBOARD';
    const ORDERS = 'ORDERS';
    const CLIENTS = 'CLIENTS';
    const MANAGERS = 'MANAGERS';
    const CATEGORIES = 'CATEGORIES';
    const PRODUCTS = 'PRODUCTS';
    const CITIES = 'CITIES';
    const DELIVERIES = 'DELIVERIES';
}