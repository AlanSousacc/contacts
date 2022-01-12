<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $id = $this->segment(3);
        return [
            'nome'     => 'required|string|min:5',
            'contato'  => 'required|min:9|max:9',
            'email'   => ['email', "unique:contatos,email,{$id},id"],
        ];
    }

    public function messages()
    {
      return [
        'nome.required'    => 'O campo Nome é obrigatório!',
        'nome.string'      => 'O campo Nome deve ser uma string!',
        'nome.min'         => 'O campo Nome deve ter ao menos 5 caracteres!',
        'contato.required' => 'O campo Contato é obrigatório!',
        'contato.min'      => 'O campo Contato deve conter pelo menos 9 caracteres!',
        'contato.max'      => 'O campo Contato deve conter no máximo 9 caracteres!',
        'email.unique'     => 'Já existe um contato com este email informado!',
      ];
    }
}
