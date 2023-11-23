<?php

namespace App\Services\User\Auth\Actions\Register;

use App\Enums as Enums;
use App\Models\User;
use App\Services\User\Auth\Contracts\Register;
use App\Services\User\Auth\Dto\Register\RegisterDto;
use App\Tasks as Tasks;
use Auth;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RegisterAction implements Register
{
    public function execute(RegisterDto $dto): void
    {
        $user = $this->createUser($dto);
        Auth::login($user);
        $user->assignRole(Enums\User\Role::USER);
    }

    public function createUser(RegisterDto $dto)
    {
        $this->checkRegistered($dto->email);
        return User::create($dto->toArray());
    }

    public function checkRegistered(string $email): void
    {
        $exists = app(Tasks\User\CheckExistingFromOnlyTrashedByEmailTask::class)->run($email);

        if ($exists) {
            throw new UnprocessableEntityHttpException(
                __('Учетная запись для этого почта уже зарегистрирована и удалена. Пожалуйста, восстановите ее.')
            );
        }
    }

}
