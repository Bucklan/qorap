<?php

namespace App\Repositories\Interface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
public function checkExistingFromOnlyTrashedByEmail(string $email);


public function checkIsUserByEmail(string $email): bool;

public function findUserByEmail(string $email);
}
