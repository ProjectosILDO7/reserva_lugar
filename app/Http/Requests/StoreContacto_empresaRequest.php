<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContacto_empresaRequest extends FormRequest
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
            'empresa' => 'bail|required',
            'email' => 'bail|required|email|unique:contacto_empresas',
            'facebook' => 'bail|required',
            'whatsapp' => 'bail|required',
            'telemovel' => 'bail|required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'empresa.required' => 'Informe o nome da empresa',
            'email.required' => 'Informe o seu e-mail',
            'email.email' => 'O e-mail informado não é válido',
            'email.unique' => 'O e-mail informado tem de ser único',
            'facebook.required' => 'Informe a pagina de facebbok da empresa',
            'whatsapp.required' => 'Informe o contácto do Wa«hatsapp da empresa',
            'telemovel.required' => 'Informe o número de telemóvel da empresa',
            'telemovel.numeric' => 'O campo do telemóvel deve ser numérico'
        ];
    }
}
