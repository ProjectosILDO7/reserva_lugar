<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransporteRequest extends FormRequest
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
        $id = $this->id ?? "";
        return [
            'transporte'=>"required|unique:transportes,transporte,{$id},id",
            'modelo'=>'required',
            'total_lugares'=>'required',
            'preco_por_lugar'=>'required',
            'procedencia'=>'required',
            'destino'=>'required',
            'destino'=>'required',
            'tipo_transporte'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required'=>'Preenchimento obrigatório',
            'descricao.unique'=>'A descrição do transporte deve ser único',
            'modelo.required'=>'Preenchimento obrigatório',
            'total_lugares.required'=>'Preenchimento obrigatório',
            'preco_por_lugar.required'=>'Preenchimento obrigatório',
            'procedencia.required'=>'Preenchimento obrigatório',
            'destino.required'=>'Preenchimento obrigatório',
            'destino.required'=>'Preenchimento obrigatório',
            'tipo_transporte.required'=>'Deves escolher o tipo de transporte',
        ];
    }       

}
