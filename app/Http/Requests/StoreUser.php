<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name'  =>  "required|max:45",
            'password' => 'required|max:255',
            'email' => 'required|email|unique:users,id,'.$this->user->id,
            'poste' => 'max:45',
            'image'  =>  'max:20000000',
            'role' => 'exists'
        ];
    }

        public  function  messages()
        {
        return[
        'name.required'  =>  "Il faut un nom pour le service",
        'name.max' => "Maximum :max caractères",
        'password.required' => "Il faut un mot de passe",
        'password.max' => "Maximum :max caractères",
        'email.required' => "Il faut une adresse mail valide",
        'poste.max' => "Maximum :max caractères",
        'image.max' => "L'image ne peut pas dépasser 20Mb",
        'roles_id.exists' => "Triche pas petit tricheur"
            ];
        }
}
