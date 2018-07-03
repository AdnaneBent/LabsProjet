<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'company' => 'required|max:45',
            'image'  =>  'required|max:20000000|dimensions:min_width=100.min_height=100',
        ];
    }

        public  function  messages()
        {
        return[
        'name.required'  =>  "Il faut un nom pour le client",
        'name.max' => "Maximum :max caractères",
        'company.required' => "Il faut un nom pour la compagnie",
        'company.max' => "Maximum :max caractères",
        'image.required'  =>  "Il faut une image pour la compagnie",
        'image.max' => "L'image ne peut pas dépasser 20Mb",
        'image.dimensions' => 'Il faut une image dont la hauteur fait 100 et la largeur 100'
            ];
        }
}
