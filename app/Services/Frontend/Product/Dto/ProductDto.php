<?php

namespace App\Services\Frontend\Product\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class ProductDto extends DataTransferObject
{
    public string $name;
    public string $description;
    public string $short_description;
    public int $price;
    public int $quantity;
    public array $categories;
    public array $colors;
    public array $images;
}