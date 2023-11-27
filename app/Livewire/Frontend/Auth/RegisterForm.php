<?php

namespace App\Livewire\Frontend\Auth;


use App\Services\Frontend\Auth\Dto\Register\RegisterDtoFactory;
use App\Services\User\Auth\Contracts as Contracts;
use Livewire\Component;

class RegisterForm extends Component
{

    public string $name = '';
    public string $surname = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public int $year_of_birth = 2023;
    protected $rules = [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|max:255|confirmed',
        'year_of_birth' => 'required|numeric|min:1950|max:2023',
    ];

    public function register()
    {
        app(\App\Services\Frontend\Auth\Contracts\Register::class)->execute(
            RegisterDtoFactory::fromArray($this->validate()));
        return redirect()->to('dashboard');

    }

    private function passwordConfirmed(): bool
    {
        return $this->password == $this->password_confirmation;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.frontend.auth.register-form')->layout('layouts.app');
    }
}
