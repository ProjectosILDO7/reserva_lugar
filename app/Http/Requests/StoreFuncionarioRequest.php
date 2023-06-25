<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFuncionarioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users,email',
            'numBI'=>'required|string|min:14|max:14',
            'picked'=>'required|string',
            'departamento_id'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'O campo do nome tem de ser preenchido',
            'email.required'=>'O campo do e-mail tem de ser preenchido',
            'email.unique'=>'O campo do e-mail tem de ser único',
            'numBI.required'=>'O nº do documento tem de ser preenchido',
            'numBI.min'=>'O nº do documento tem de ter no minimo 14 caracter',
            'numBI.max'=>'O nº do documento tem de ter no máximo 14 caracter',
            'picked.required'=>'Preencha a data de validade do documento',
            'departamento_id.required'=>'Selecione um departamento',
        ];
    }
}
