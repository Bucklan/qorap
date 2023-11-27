<?php

namespace App\Services\Frontend\Auth\Contracts;

interface Login
{
public function execute(string $email, string $password): void;
}