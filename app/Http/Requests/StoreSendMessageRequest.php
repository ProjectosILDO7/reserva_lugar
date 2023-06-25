<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSendMessageRequest extends FormRequest
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
            'email'=>['bail','email', 'required'],
            'telemovel'=>['bail','numeric','required','min:9'],
            'comentario'=>['bail','string','max:255','min:2'],
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'O campo de email tem de ser preenchido',
            'email.email'=>'O E-mail informado não é válido',
            'telemovel.required'=>'O campo do contacto tem de ser preenchido',
            'telemovel.numeric'=>'O campo do contacto tem de ser do tipo numérico',
            'telemovel.min'=>'O campo do contacto tem de ter no minimo 9 dígitos',
            //'telemovel.max'=>'O campo do contacto tem de ter no máximo 9 dígitos',
            'comentario.required'=>'O corpo da mensagem tem que ser preenchido',
            'comentario.min'=>'O corpo da mensagem tem que ter no mínimo 2 caracter',
            'comentario.max'=>'O corpo da mensagem tem que ter no máximo 255 caracter',
            'comentario.string'=>'O corpo da mensagem tem que ser do tipo alfa-numeríco',
        ];
    }
}
