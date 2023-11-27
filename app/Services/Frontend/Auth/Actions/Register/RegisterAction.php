<?php

namespace App\Services\Frontend\Auth\Actions\Register;

use App\Enums as Enums;
use App\Models\User;
use App\Services\Frontend\Auth\Contracts\Register;
use App\Services\Frontend\Auth\Dto\Register\RegisterDto;
use App\Tasks as Tasks;
use Auth;
use Illuminate\Validation\ValidationException;

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
            throw ValidationException::withMessages([
             'email' => __('register.The account for this mail has already been registered and deleted. Please restore it.')
            ]);
        }
    }

}
