<?php

namespace App\Http\Controllers\Auth;

use App\Enums\User\Role;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $password = Str::random(10);
        try {
            $user = Socialite::driver('google')->user();
//            dd($user);
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->user['given_name'],
                    'surname' => $user->user['family_name'],
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => $password,
                ]);
                $newUser->assignRole(Role::USER);

                Auth::login($newUser);
                \Mail::to($newUser->email)->send(new \App\Mail\User\PasswordMail($password));
                return redirect('/');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
