<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function checkExistingFromOnlyTrashedByEmail(string $email): bool
    {
        return $this->model
            ->query()
            ->withTrashed()
            ->where('email', $email)
            ->exists();
    }


    public function checkIsUserByEmail(string $email): bool
    {
        return $this->model
            ->query()
            ->where('email', $email)
            ->exists();
    }
    public function findUserByEmail(string $email): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder|User|null
    {
        return $this->model
            ->query()
            ->where('email', $email)
            ->first();
    }
}
