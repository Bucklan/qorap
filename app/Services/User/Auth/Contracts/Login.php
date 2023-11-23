<?php

namespace App\Services\User\Auth\Contracts;

interface Login
{
public function execute(string $email, string $password): void;
}