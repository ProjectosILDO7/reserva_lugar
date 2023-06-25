<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransporteRequest extends FormRequest
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

    public function rules()
    {
        return [
            'transporte'=>'required|unique:transportes,transporte',
            'modelo'=>'required',
            'total_lugares'=>'required',
            'preco_por_lugar'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'transporte.required'=>'Preenchimento obrigatório',
            'transporte.unique'=>'A descrição do transporte deve ser único',
            'modelo.required'=>'Preenchimento obrigatório',
            'total_lugares.required'=>'Preenchimento obrigatório',
            'preco_por_lugar.required'=>'Preenchimento obrigatório',
        ];
    }
}
