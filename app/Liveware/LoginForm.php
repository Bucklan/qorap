<?php

namespace App\Liveware;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;

class LoginForm extends Component
{
    #[Rule('required|email|exists:users,email')]
    public string $email;
    #[Rule('required|string|max:255')]
    public string $password;
    public function login(){
        $validate = $this->validate();
        $user = User::where('email',$this->email)->where('password',$this->password)->first();
        if($user){
            Auth::login($user);
            $this->reset($this->email,$this->password);
            return redirect()->route('dashboard');
        } else{
            return back()->withErrors('email and password are wrong.');
        }
    }
    public function render()
    {
        return view('liveware.login-form');
    }
}
