<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditProjet extends FormRequest
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
            'image'  =>  'max:20000000|dimensions:min_width=362.min_height=271',
            'image.max' => "L'image ne peut pas dépasser 20Mb",
           

        ];
    }

        public  function  messages()
        {
        return[
        'name.required'  =>  "Il faut un nom pour le service",
        'name.max' => "Maximum :max caractères",
        'contenu.required' => "Il faut du contenu pour les services",
        'contenu.max' => "Maximum :max caractères",
        'image.dimensions' => 'Il faut une image dont la hauteur fait 362 et la largeur 271'
            ];
        }
}
