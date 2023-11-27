<?php

namespace App\Livewire\Backend\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportValidation\Rule;

class Login extends Component
{
    #[Rule('required|email|exists:users,email')]
    public string $email;
    #[Rule('required|string|max:255')]
    public string $password;

    public function login()
    {
        $validate = $this->validate();
        $check = $this->checkUserRole();
//        dd(Auth::attempt($validate));
        if ($check && Auth::attempt($validate)){
            $this->reset($this->email, $this->password);
            return redirect()->intended('/admin/dashboard');
        }
        else{
            return redirect()->back()->with('error','your email or password is wrong');
        }
    }

    private function checkUserRole(): bool
    {
        return !User::hasRoleIsUser($this->email);
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.auth.login')->layout('layouts.admin');
    }
}