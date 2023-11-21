<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    public function creating(User $user): void
    {
        if (!request()->isNotFilled('password')) {
            $user->password = Hash::make(request()->get('password'));
            $user->password_changed_at = now()->toDateTimeString();
        } else {
            $user->password = Hash::make($user->password);
        }
    }
}
