<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth as Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function register(\App\Services\Frontend\Auth\Requests\RegisterRequest $request)
    {
        app(\App\Services\Frontend\Auth\Contracts\Register::class)->execute(
            \App\Services\Frontend\Auth\Dto\Register\RegisterDtoFactory::fromRequest($request)
        );
        return redirect()->route('gift.index');
    }
//    public function update(Request $request, User $user)
//    {
//
//        $validate = $request->validate([
//            'name' => 'required|string|max:255',
//            'image' => 'mimes:jpg,png,jpeg,gif,webp|dimensions:min_width=16,min_height=16,max_width=100,max_height=100',
//        ]);
//        $image_path = Auth::user()->image;
//        if ($request->hasFile('image')) {
//            $fileName = time() . $request->file('image')->getClientOriginalName();
//            $image_path = $request->file('image')->storeAs('users', $fileName, 'public');
//            $validate['image'] = '/storage/' . $image_path;
//        }
//
//        Auth::user()->update($validate);
//        return redirect()->route('profile.form')->with('message', 'Your profile successfully edited');
//    }
}
