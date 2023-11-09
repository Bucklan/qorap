<?php

namespace App\Liveware;

use App\Models\User;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RegisterForm extends Component
{

    #[Rule('required|string|max:255')]
    public string $name = '';
    #[Rule('required|email|unique:users,email')]
    public string $email = '';
    #[Rule('required|max:255|confirmed')]
    public string $password = '';
    #[Rule('required|max:255')]
    public string $password_confirmation = '';

    public function register()
    {

        $validated = $this->validate();
        User::create($validated);
        session()->flash('message', 'You are successfully registered!');
        $this->reset('name', 'email', 'password', 'password_confirmation');
    }

    private function passwordConfirmed()
    {
        return $this->password == $this->password_confirmation;
    }

    public function render()
    {
        return view('liveware.register-form');
    }
}
