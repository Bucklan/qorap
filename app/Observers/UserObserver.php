<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user): void
    {
        if (!request()->isNotFilled('password')) {
            $user->password = bcrypt(request()->get('password'));
            $user->password_changed_at = now()->toDateTimeString();
        } else {
            $user->password = bcrypt($user->password);
        }
    }
}
