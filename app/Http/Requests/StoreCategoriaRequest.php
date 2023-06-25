<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
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
            'categoria'=>'required|unique:categorias,categoria',
            'remoneracao'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'categoria.required'=>'Informe o nome da categoria',
            'categoria.unique'=>'A categoria que pretende cadastrar já existe',
            'remoneracao.required'=>'Informe o valor da remoneração',
        ];
    }
}
