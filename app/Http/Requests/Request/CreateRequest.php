<?php

namespace App\Http\Requests\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'service' => 'required',
            'question' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите имя',
            'phone_number.required' => 'Введите ваш номер телефона',
            'phone_number.regex' => 'Допустимы цифры 0-9 и символы',
            'phone_number.min' => 'Номер должен состоять из 10 символов',
            'service.required' => 'Выберите услугу',
        ];
    }
}
