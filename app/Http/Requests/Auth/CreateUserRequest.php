<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'surname' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'middle_name' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'phone_number' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'city' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|same:re_password|min:6',
            'image_path' => 'nullable|mimes:jpg,png,jpeg|max:5000',
            'rules' => 'accepted'
        ];
    }
}
