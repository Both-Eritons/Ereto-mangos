<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:users,email|min:10|max:155',
            'password' => 'required|string|min:6|max:30'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O Email é obrigatorio.',
            'email' => 'O Email precisa ser Valido.',
            'email.max' => 'O Email Nao pode ultrapassar ',

            'password.required' => 'A Senha É obrigatoria',
            'password.min' => 'A senha Esta muito curta',
            'password.max' => 'a Senha Está muito longa',

            'username.required' => 'o Nome de Usuario é obrigatorio',
            'username.min' => 'Nome de Usuario Esta muito curto',
            'username.max' => 'Nome de Usuario Ultrapassou o Limite',
        ];
    }

}
