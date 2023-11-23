<?php

namespace App\Services\User\Auth\Dto\Register;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterDto extends DataTransferObject
{
    public string $name;
    public string $surname;
    public string $email;
    public string $password;
    public int $year_of_birth;
    public ?string $gender;
}
