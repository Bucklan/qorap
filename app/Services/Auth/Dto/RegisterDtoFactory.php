<?php

namespace App\Services\Auth\Dto;

use App\Services\Auth\Requests\RegisterRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): RegisterDto
    {
        return new RegisterDto([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']

        ]);
    }
}
