<?php

namespace App\Http\Requests\Chapter;

use Illuminate\Foundation\Http\FormRequest;

class UploadChapterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'images' => 'required|array|min:1|max:20',
            'images.*' => 'required|mimetypes:image/jpeg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'images.required' => 'a imagem é obrigatoria',
            'images' => 'a imagem precisa ser valida',
            'images.min' => 'total de imagem é inferior a 1',
            'images.max' => 'total de imagem é superior a 20',
        ];
    }
}
