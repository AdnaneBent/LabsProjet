<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
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
            'contenu' => 'required|max:255',
            'image'  =>  'required|max:20000000',
        ];
    }

        public  function  messages()
        {
        return[
        'name.required'  =>  "Il faut un nom pour le service",
        'name.max' => "Maximum :max caractères",
        'contenu.required' => "Il faut du contenu",
        'contenu.max' => "Maximum :max caractères",
        'image.required'  =>  "Il faut une icone pour les services",
        'image.max' => "L'image ne peut pas dépasser 20Mb",
            ];
        }
}