<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'text' => 'nullable|min:3',
            'price' => 'required|numeric|min:1',
            'quantity' => 'nullable|numeric',
            'collection_id' => 'required|exists:collections,id',
            'image_path' => 'nullable|mimes:jpg,png,jpeg,webp,svg'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите название продукта',
            'name.min' => 'Минимум 3 символа',
            'text.min' => 'В описании минимум 3 символа',
            'price.required' => 'Введите стоимость',
            'price.numeric' => 'Только числовое значение',
            'price.min' => 'Минимум 1 ₽',
            'quantity.numeric' => 'Только числовое значение',
            'collection_id.required' => 'Выберите категорию',
            'image_path.mimes' => 'Недопустимый формат. Загрузите фото в .png, .jpg или .webp',
        ];
    }
}
