<?php

namespace App\Services\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:2|confirmed',
            'image' => 'mimes:jpg,png,jpeg,gif,webp',//|dimensions:min_width=16,min_height=16,max_width=100,max_height=100
        ];
    }
}
