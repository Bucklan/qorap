<?php

namespace App\Services\Frontend\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
      return auth()->guest();
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:2',
            'year_of_birth' => 'required|numeric|min:1950',
        ];
    }
}
