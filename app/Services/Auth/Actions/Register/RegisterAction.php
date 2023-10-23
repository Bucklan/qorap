<?php

namespace App\Services\Auth\Actions\Register;

use App\Enums as Enums;
use App\Models\User;
use App\Services\Auth\Contracts\Register;
use App\Services\Auth\Dto\Register\RegisterDto;
use App\Tasks as Tasks;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RegisterAction implements Register
{
    public function execute(RegisterDto $dto): array
    {
        $user = $this->createUser($dto);
        $user->assignRole(Enums\User\Role::USER);
        return [
            'user' => $user
        ];
    }

    public function createUser(RegisterDto $dto)
    {
        $this->checkRegistered($dto->email);
        return User::create($dto->toArray());
    }

    public function checkRegistered(string $email): void
    {
        $exists = app(Tasks\Client\CheckExistingFromOnlyTrashedByEmailTask::class)->run($email);

        if ($exists) {
            throw new UnprocessableEntityHttpException(
                __('Учетная запись для этого почта уже зарегистрирована')
            );
        }
    }

}
