<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
//        return view
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended('/');
        }

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:2'
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->role->name != "USER") {
                    if (Auth::user()->role->name == "PARTNER") {
                        return redirect()->intended('/partner/mygifts');
                    }
                    return redirect()->intended('/adm/users');
            }
            return redirect()->intended('/gift');
        }
        return redirect()->back()->withErrors('Incorrect email or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('register.form');
    }

    public function profile()
    {
        $users = Auth::user();
        $categories = Category::whereNull('parent_id')->with('categories.gender')->get();
        $genders = Gender::all();
        return view('gifts.profile', ['user' => $users, 'categories' => $categories,'genders'=>$genders]);
    }


}
