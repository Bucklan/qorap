<?php

namespace App\Services\User\Auth\Contracts;

use App\Services\User\Auth\Dto\Register\RegisterDto;

interface Register
{
    public function execute(RegisterDto $dto): void;

}
