<?php

namespace App\Services\Auth\Dto\Register;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterDto extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
    public ?int $year_of_birth;
    public ?int $gender;
}
