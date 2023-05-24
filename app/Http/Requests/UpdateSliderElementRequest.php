<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderElementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'top_title' => 'string|max:100',
            'main_title' => 'string|max:100',
            'button_text' => 'string|max:25',
            'button_url' => 'string|max:100',
            'image' => 'image|mimes:jpg,jpeg,png'
        ];
    }
}
