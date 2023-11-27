<?php

namespace App\Livewire\Frontend\Auth;

use App\Services\Frontend\Auth\Contracts\Login;
use Livewire\Component;

class LoginForm extends Component
{
    public string $email;
    public string $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|max:255',
    ];

    public function login()
    {
        $validate = $this->validate();
        app(Login::class)->execute(
            $validate['email'], $validate['password']);
        return redirect()->to('/dashboard');
    }


    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.frontend.auth.login-form')->layout('layouts.app');
    }
}
