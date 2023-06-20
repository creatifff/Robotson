<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|same:re_password|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Введите пароль',
            'password.same' => 'Пароли не совпадают',
            'password.min' => 'Минимум 6 символов',
        ];
    }
}
