<?php

namespace App\Services\Auth\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterDto extends DataTransferObject
{
    public string $name;
    public ?int $year_of_birth;
    public int $gender;
    public ?string $promo_code;
}
