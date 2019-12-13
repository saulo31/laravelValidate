<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:25',
            'email' => 'required|max:255|email|unique:users',
            'imagem' => 'required|mimes:png',
            'numero' => 'num_par',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O campo nome deve ter no máximo 25 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres',
            'email.email' => 'Preencha um email válido',
            'email.unique' => 'Email já cadastrado no sistema',
            'imagem.required' => 'Envie uma imagem',
            'imagem.mimes' => 'Envie uma imagem PNG',
            'numero.num_par' => 'O número deve ser par',
        ];
    }
}
