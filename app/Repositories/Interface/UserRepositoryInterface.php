<?php

namespace App\Repositories\Interface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
public function checkExistingFromOnlyTrashedByEmail(string $email);
}
