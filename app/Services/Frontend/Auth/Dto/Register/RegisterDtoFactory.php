<?php

namespace App\Services\Frontend\Auth\Dto\Register;

use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisterDtoFactory
{
    public static function fromArray(array $data): RegisterDto
    {
        try {
            return new RegisterDto([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => $data['password'],
                //            'gender' => $data['gender'],
                'year_of_birth' => $data['year_of_birth'],
            ]);
        } catch (UnknownProperties $e) {
            throw new \InvalidArgumentException($e->getMessage());
        }
    }
}
