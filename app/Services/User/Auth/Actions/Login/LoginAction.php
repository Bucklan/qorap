<?php

namespace App\Services\User\Auth\Actions\Login;

use App\Models\User;
use App\Services\User\Auth\Contracts\Login;
use App\Tasks as Tasks;
use Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

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
                'email' => __('Неверный пароль или почта. Пожалуйста, попробуйте еще раз.'),
            ]);
        }
    }

    private function checkIsBlocked(User $user): void
    {
        $isBlocked = $user->isLoginBlocked();
        if ($isBlocked) {
            throw ValidationException::withMessages([
                'email' => __('Учетная запись для этого почта заблокирована. Пожалуйста, обратитесь к администратору.')
            ]);
        }
    }

    private function checkIsDeleted(string $email): void
    {
        $isDeleted = app(Tasks\User\CheckExistingFromOnlyTrashedByEmailTask::class)->run($email);

        if ($isDeleted) {
            throw ValidationException::withMessages([
                'email' => __('Учетная запись для этого почта удалена. Пожалуйста, обратитесь к администратору.')
            ]);
        }
    }
}