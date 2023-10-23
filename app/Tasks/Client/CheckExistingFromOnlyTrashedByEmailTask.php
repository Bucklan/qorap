<?php

namespace App\Tasks\Client;

class CheckExistingFromOnlyTrashedByEmailTask
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }

    public function run(string $email): bool
    {
return $this->repository->checkExistingFromOnlyTrashedByEmail($email);
    }
}
