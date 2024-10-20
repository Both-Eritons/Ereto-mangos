<?php

namespace App\Http\Requests\Manga;

use App\Enums\Manga\UpdateFields;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMangaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->guard();

        if ($user->check()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|int|min:1',
            'new_value' => 'required|string|min:3|max:800',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'O ID é obrigatorio.',
            'id' => 'O ID precisa ser Valido.',
            'id.min' => 'O ID Está muito curto.',

            'new_value.required' => 'O Novo Valor é obrigatorio.',
            'new_value' => 'O novo valor precisa ser Valido.',
            'new_value.min' => 'O Novo valor Está muito curto.',
            'new_value.max' => 'O novo valor ultrapassou o Limite.',
        ];
    }
}
