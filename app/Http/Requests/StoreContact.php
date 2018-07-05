<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
            "name"  =>  "required|max:255",
            "email"  =>  "required|email|unique:users",
            "message" => "required", 
            "subject" => 'required|max:255',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => "Il faut mettre votre nom",
            'email.required' => "Il faut une adresse mail valide",
            "message.required" => "Il faut un message",
            "subject.required" =>  "Il faut un sujet",
            'subject.max' => "Maximum :max caractères",
        ];
    }
}
