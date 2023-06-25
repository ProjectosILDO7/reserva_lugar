<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartamentoRequest extends FormRequest
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
        $id=$this->id ?? '';
        return [
            'departamento'=>"required|string|max:255|unique:departamentos,departamento,{$id},id",
        ];
    }

    public function messages()
    {
        return [
            'departamento.required'=>"Informe o departamento que pretendes registar",
            'departamento.unique'=>"Já existe um departamento registado com este nome...!",
        ];
    }
}
