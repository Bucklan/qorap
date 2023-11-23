<?php

namespace App\Tasks\User;

use App\Repositories\Interface\UserRepositoryInterface;

class FindUserByEmailTask
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }
    public function run(string $email)
    {
        return $this->repository->findUserByEmail($email);
    }
}