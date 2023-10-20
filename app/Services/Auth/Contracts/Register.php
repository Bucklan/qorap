<?php

namespace App\Services\Auth\Contracts;

use App\Services\Auth\Dto\RegisterDto;

interface Register
{
    public function execute(RegisterDto $dto): array;

}
