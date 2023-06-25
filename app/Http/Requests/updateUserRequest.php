<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255",
            'password' =>'nullable|string|min:6|max:15',
        ];

        // if($this->method('PUT')){
        //     $rules['password'] = ['nullable', 'min:6', 'max:15'];
        //     $rules['email'] = ['required', 'string', 'email', 'max:255'];
        // }

        //return $rules;
    }
}
