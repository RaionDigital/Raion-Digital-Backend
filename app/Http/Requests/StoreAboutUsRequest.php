<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutUsRequest extends FormRequest
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
            'main_title' => 'required|string|max:100',
            'main_description' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'service_icon1' => 'required|image|mimes:png',
            'service_title1' => 'required|string|max:100',
            'service_description1' => 'required|string|max:255',
            'service_icon2' => 'required|image|mimes:png',
            'service_title2' => 'required|string|max:100',
            'service_description2' => 'required|string|max:255',
            'video_title' => 'string|max:50',
            'video_url' => 'url|max:255',
            'video' => 'video|mimes:mkv,mp4,flv,mov,mpeg4'
        ];
    }
}
