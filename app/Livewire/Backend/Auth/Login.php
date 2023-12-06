<?php

namespace App\Livewire\Backend\Auth;

use App\Models\User;
use App\Services\Backend\Auth\LoginService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;

class Login extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];



    public function login(): void
    {
        $this->validate();
        app(LoginService::class)->run($this->email, $this->password);
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.backend.auth.login')
            ->layout('layouts.admin');
    }
}