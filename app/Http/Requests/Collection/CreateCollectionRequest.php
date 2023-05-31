<?php

namespace App\Http\Requests\Collection;

use Illuminate\Foundation\Http\FormRequest;

class CreateCollectionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'image_path' => 'nullable|mimes:jpg,png,jpeg,webp|max:5000'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите название категории',
            'name.min' => 'В названии не менее 3-х символов',
            'image_path.mimes' => 'Допустимые форматы: .png, .jpg, .webp',
            'image_path.max' => 'Размер изображения не должен превышать 5 MB',
        ];
    }
}
