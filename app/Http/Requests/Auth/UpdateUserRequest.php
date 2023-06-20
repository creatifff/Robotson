<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu|min:2',
            'surname' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'middle_name' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'city' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'email' => 'required|email',
            'image_path' => 'nullable|mimes:jpg,png,jpeg,webp|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите ваше имя',
            'name.regex' => 'Только кириллица и пробел',
            'name.min' => 'Слишком короткое имя',
            'surname.regex' => 'Только кириллица и пробел',
            'middle_name.regex' => 'Только кириллица и пробел',
            'phone_number.required' => 'Введите ваш номер телефона',
            'phone_number.regex' => 'Допустимы цифры 0-9 и символы',
            'phone_number.min' => 'Номер состоит минимум из 10 символов',
            'city.regex' => 'Только кириллица и пробел',
            'email.required' => 'Введите электронную почту',
            'email.email' => 'Неверный формат почты',
            'image_path.mimes' => 'Допустимые форматы: .png, .jpg, .webp',
            'image_path.max' => 'Размер фото не более 5 MB',
        ];
    }
}
