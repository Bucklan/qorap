<?php

namespace App\Services\Backend\Auth;

use App\Enums\User\Role;
use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Tasks\User\CheckIsUserByEmailTask;
use App\Tasks\User\FindUserByEmailTask;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;

class LoginService
{

    public function run(string $email, string $password)
    {
        $user = $this->findUserByEmail($email);
        $this->checkIsUser($user);
        $this->checkIsBlocked($user);
        $this->loginUser($email, $password);

    }
    private function LoginUser(string $email, string $password): void
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => __('login.Invalid password or email. Please try again.'),
            ]);
        }
    }
    private function checkIsUser(User $user): void
    {
        if ($user->hasRole(Role::USER)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => __('login.The account does not policy this panel. Please contact the administrator.')
            ]);
        }
    }

    private function checkIsBlocked(User $user): void
    {
        if ($user->isLoginBlocked()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => __('login.The account for this mail is blocked. Please contact the administrator.')
            ]);
        }
    }

    private function findUserByEmail(string $email): User
    {
        $user = app(FindUserByEmailTask::class)->run($email);

        if (!$user) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => __('login.The account for this mail is blocked. Please contact the administrator.')
            ]);
        }

        return $user;
    }
}