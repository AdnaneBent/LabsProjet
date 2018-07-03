<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditArticle extends FormRequest
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
            'titre'  =>  "required|max:45",
            'contenu' => 'required',
            'tags_id' => 'required',
            'image'  =>  'max:20000000|dimensions:min_width=755.min_height=270',
            
        ];
    }

        public  function  messages()
        {
        return[
        'titre.required'  =>  "Il faut un titre pour ton article",
        'titre.max' => "Maximum :max caractères",
        'contenu.required' => "Il faut un contenu pour l'article",
        'contenu.max' => "Maximum :max caractères",
        'tags_id.required' => 'Il faut cocher un tag',
        'image.max' => "L'image ne peut pas dépasser 20Mb",
        'image.dimensions' => 'Il faut une image dont la hauteur fait 755 et la largeur 270',
            ];
        }
}
