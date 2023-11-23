<?php

namespace App\Tasks\User;

use App\Repositories\Interface\UserRepositoryInterface;

class CheckIsBlockedByEmailTask
{
public function __construct(private readonly UserRepositoryInterface $repository)
{
}
public function run(string $email): bool
{
    return $this->repository->checkIsBlockedByEmail($email);
}
}