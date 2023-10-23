<?php

namespace App\Services\Auth\Dto\Register;

use App\Services\Auth\Requests\RegisterRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterDtoFactory
{

    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return self::fromArray($request->validated());
    }

    public static function fromArray(array $data): RegisterDto
    {
        return new RegisterDto([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'gender' => $data['gender'],
            'year_of_birth' => $data['year_of_birth'],
        ]);
    }
}
