<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'logo' => 'image|mimes:jpg,jpeg,png',
            'description' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'link' => 'url|max:100'
        ];
    }
}
