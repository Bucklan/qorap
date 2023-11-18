<?php

namespace App\Liveware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;

class LoginForm extends Component
{
    #[Rule('required|email|exists:users,email')]
    public string $email;
    #[Rule('required|string|max:255')]
    public string $password;
    public bool $alertError = false;

    public function login()
    {
        $validate = $this->validate();

        if (Auth::attempt($validate)) {
            $this->reset($this->email, $this->password);
            return redirect()->intended('/products');
        } else {
            session()->flash('error', 'email and password are wrong.');
        }
        return redirect()->back();
    }

    public function alertClass()
    {
        $this->alertError = true;
    }

    public function render()
    {
        return view('liveware.login-form');
    }
}
