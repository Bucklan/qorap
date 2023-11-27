<?php

namespace App\Services\Frontend\Auth\Actions\Login;

use App\Models\User;
use App\Services\Frontend\Auth\Contracts\Login;
use App\Tasks as Tasks;
use Illuminate\Validation\ValidationException;

class LoginAction implements Login
{
    public function execute(string $email, string $password): void
    {

            $user = app(Tasks\User\FindUserByEmailTask::class)->run($email);
            if ($user){
                $this->checkIsBlocked($user);
            }
//            $this->checkIsDeleted($email);
            $this->loginUser($email, $password);

    }

    private function loginUser(string $email, string $password): void
    {
        if (!auth()->attempt(['email' => $email, 'password' => $password])) {
            throw ValidationException::withMessages([
                'email' => __('login.Invalid password or email. Please try again.'),
            ]);
        }
    }

    private function checkIsBlocked(User $user): void
    {
        $isBlocked = $user->isLoginBlocked();
        if ($isBlocked) {
            throw ValidationException::withMessages([
                'email' => __('login.The account for this mail is blocked. Please contact the administrator.')
            ]);
        }
    }

    private function checkIsDeleted(string $email): void
    {
        $isDeleted = app(Tasks\User\CheckExistingFromOnlyTrashedByEmailTask::class)->run($email);

        if ($isDeleted) {
            throw ValidationException::withMessages([
                'email' => __('login.The account for this mail has been deleted. Please contact the administrator.')
            ]);
        }
    }
}