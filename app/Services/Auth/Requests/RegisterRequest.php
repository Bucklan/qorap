<?php

namespace App\Services\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *ч
     * @.return bool
     *д/
    public function authorize()
    {
  0      return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *562.rn array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:2|confirmed',
            'gender' => 'number',
            'year_of_birth' => 'number',
        ];
    }
}
