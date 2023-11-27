<?php

namespace App\Services\Frontend\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'categories' => 'required|array',
            'categories.*' => 'required|numeric|exists:categories,id',
            'colors' => 'required|array',
            'colors.*' => 'required|numeric|exists:colors,id',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}