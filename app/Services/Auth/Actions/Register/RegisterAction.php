<?php

namespace App\Services\Auth\Actions\Register;

use App\Models\User;
use App\Services\Auth\Contracts\Register;
use App\Services\Auth\Dto\RegisterDto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterAction implements Register
{
    public function execute(RegisterDto $dto): array
    {
        dd($dto);
//    if ($request->hasFile('image')) {
//        $fileName = time() . $request->file('image')->getClientOriginalName();
//        $image_path = $request->file('image')->storeAs('users', $fileName, 'public');
//    }
//    $user = User::create([
//        'name' => $request->input('name'),
//        'email' => $request->input('email'),
//        'image' => '/storage/' . $image_path,
//        'password' => Hash::make($request->input('password')),
//    ]);
//    $user->assignRole(\App\Enums\User\Role::USER);
//    Auth::login($user);
    }

    public function createUser(RegisterDto $dto)
    {
    }

    public function checkRegistered(Register $dto)
    {

    }

    public function ensureThatEmailIsNotRegisteredAndDeleted(RegisterDto $dto, User $user)
    {
    }
}
