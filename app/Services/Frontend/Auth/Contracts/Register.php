<?php

namespace App\Services\Frontend\Auth\Contracts;

use App\Services\Frontend\Auth\Dto\Register\RegisterDto;

interface Register
{
    public function execute(RegisterDto $dto): void;

}
