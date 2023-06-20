<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'surname' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'middle_name' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone_number',
            'city' => 'nullable|regex:/^[А-Яа-яёЁ\s-]+$/iu',
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
            'name.min' => 'Слишком короткое имя',
            'surname.regex' => 'Только кириллица и пробел',
            'middle_name.regex' => 'Только кириллица и пробел',
            'phone_number.required' => 'Введите ваш номер телефона',
            'phone_number.unique' => 'Этот номер привязан к другому аккаунту',
            'phone_number.regex' => 'Допустимы цифры 0-9 и символы',
            'phone_number.min' => 'Номер должен состоять из 10 символов',
            'city.regex' => 'Только кириллица и пробел',
            'email.required' => 'Введите электронную почту',
            'email.unique' => 'Пользователь с такой почтой существует',
            'email.email' => 'Неверный формат почты',
            'password.required' => 'Введите пароль',
            'password.same' => 'Введенные пароли не совпадают',
            'password.min' => 'Минимум 6 символов в пароле',
            'image_path.mimes' => 'Допустимые форматы: .png, .jpg, .webp',
            'image_path.max' => 'Размер фото не более 5 MB',
            'rules.accepted' => 'Для регистрации вы должны принять условия'
        ];
    }
}
