<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonial extends FormRequest
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
            'contenu' => 'required|max:255',
            'clients_id'  =>  'required',
        ];
    }

        public  function  messages()
        {
        return[
        'client.requireds_id'  =>  "Il faut un nom de client",
        'contenu.required' => "Il faut du contenu",
        'contenu.max' => "Maximum :max caractères"
            ];
        }
}
