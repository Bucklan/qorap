<?php

namespace App\Services\Auth\Dto;

use App\Services\Auth\Requests\RegisterRequest;

class RegisterDtoFactory
{
    public function fromRequest(RegisterRequest $request): RegisterDto
    {
        return self::fromArray($request->validated());
    }

    public static function fromArray(array $data): RegisterDto
    {
    return new RegisterDto([
//'name' => ,
//        'email' => ,
//        'password' => ,
//        ''
    ]);
    }
}
