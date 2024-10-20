<?php

namespace App\Http\Requests\Manga;

use App\Enums\Manga\MangaType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMangaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->guard();

        if($user->check()) {
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
            'title' => 'required|string|min:3|max:200',
            'type' => [Rule::enum(MangaType::class)],
            'sinopse' => 'required|min:10|max:400',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O Titulo é obrigatorio.',
            'title' => 'O Title precisa ser Valido.',
            'title.min' => 'O Titulo Está muito curto.',
            'title.max' => 'O Titulo ultrapassou o Limite.',

            'sinopse.required' => 'A Sinopse é obrigatorio.',
            'sinopse' => 'A sinopse precisa ser Valido.',
            'sinopse.min' => 'A Sinopse Está muito curta.',
            'sinopse.max' => 'A sinopse ultrapassou o Limite.',


        ];
    }

}
