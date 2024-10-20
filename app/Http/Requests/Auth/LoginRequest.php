<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $isLogged = auth()->guard()->check();

        return $isLogged ? false : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6|max:30'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O Email é obrigatorio.',
            'email' => 'O Email precisa ser Valido.',
            'email.max' => 'O Email Esta muito longo',

            'password.required' => 'A Senha É obrigatoria',
            'password.min' => 'A senha Esta muito curta',
            'password.max' => 'a Senha Está muito longa',
        ];
    }
}
