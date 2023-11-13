<?php

namespace App\Liveware;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            $this->reset($this->email,$this->password);
           return redirect()->route('home');
        }else{
            session()->flash('error', 'email and password are wrong.');
        }


    }
    public function render()
    {
        return view('liveware.login-form');
    }
}
