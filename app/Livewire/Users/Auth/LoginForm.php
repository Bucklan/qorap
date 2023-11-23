<?php

namespace App\Livewire\Users\Auth;

use App\Services\User\Auth\Contracts\Login;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;

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
        return view('livewire.users.auth.login-form')->layout('layouts.app');
    }
}
