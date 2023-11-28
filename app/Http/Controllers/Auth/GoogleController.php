<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
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
                    'password' => encrypt(rand(8123123321, 321123321123)),
                ]);

                Auth::login($newUser);
                return redirect('/');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

