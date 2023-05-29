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
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'city' => 'required|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|same:re_password|min:6',
            'image_path' => 'nullable|mimes:jpg,png,jpeg,webp|max:5000',
            'rules' => 'accepted'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите ваше имя',
            'name.regex' => 'Только кириллица и пробел',
            'surname.required' => 'Введите вашу фамилию',
            'surname.regex' => 'Только кириллица и пробел',
            'middle_name.regex' => 'Только кириллица и пробел',
            'phone_number.required' => 'Введите ваш номер телефона',
            'phone_number.regex' => 'Допустимы цифры 0-9 и символы',
            'phone_number.min' => 'Номер должен состоять из 10 символов',
            'city.required' => 'Укажите ваш город',
            'city.regex' => 'Только кириллица и пробел',
            'email.required' => 'Введите электронную почту',
            'email.unique' => 'Такой пользователь уже существует',
            'email.email' => 'Неверный формат почты',
            'password.required' => 'Введите пароль',
            'password.same' => 'Пароли не совпадают',
            'password.min' => 'Минимум 6 символов',
            'image_path.mimes' => 'Допустимые форматы: .png, .jpg, .webp',
            'image_path.max' => 'Размер фото не более 5 MB',
            'rules.accepted' => 'Для регистрации вы должны принять наши правила'
        ];
    }
}
