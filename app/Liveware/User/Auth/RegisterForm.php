<?php

namespace App\Liveware\User\Auth;

use App\Enums\User\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RegisterForm extends Component
{

    #[Rule('required|string|max:255')]
    public string $name = '';
    #[Rule('required|string|max:255')]
    public string $surname = '';
    #[Rule('required|email|unique:users,email')]
    public string $email = '';
    #[Rule('required|max:255|confirmed')]
    public string $password = '';
    #[Rule('required|max:255')]
    public string $password_confirmation = '';
    #[Rule('required|numeric|min:1950|max:2023')]
    public int $year_of_birth = 1950;

    public function register()
    {

        $validatedData = $this->validate();
        $user = User::create($validatedData);

        $user->assignRole(Role::USER->value); // Assign the user role

        Auth::login($user); // Log in the user after registration

        session()->flash('message', 'You are successfully registered!');
        $this->reset(['name', 'email', 'password', 'password_confirmation']);

        return redirect()->route('dashboard');
    }

    private function passwordConfirmed(): bool
    {
        return $this->password == $this->password_confirmation;
    }

    public function render()
    {
        return view('liveware.users.auth.register-form')->layout('layouts.app');
    }
}
