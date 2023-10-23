<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use App\Services\Auth\Contracts\Register;
use App\Services\Auth\Dto\Register\RegisterDtoFactory;
use App\Services\Auth\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        app(Register::class)->execute(
            RegisterDtoFactory::fromRequest($request)
        );

        return redirect()->route('gift.index');

    }

    public function update(Request $request, User $user)
    {
//        dd($user->name);
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'mimes:jpg,png,jpeg,gif,webp|dimensions:min_width=16,min_height=16,max_width=100,max_height=100',
        ]);
        $image_path = Auth::user()->image;
        if ($request->hasFile('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $image_path = $request->file('image')->storeAs('users', $fileName, 'public');
            $validate['image'] = '/storage/' . $image_path;
        }

        Auth::user()->update($validate);
        return redirect()->route('profile.form')->with('message', 'Your profile successfully edited');
    }
}
