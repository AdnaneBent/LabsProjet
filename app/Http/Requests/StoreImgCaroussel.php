<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImgCaroussel extends FormRequest
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
            'image'  =>  'required|max:20000000|dimensions:min_width=1920.min_height=1274',
        ];
    }

        public  function  messages()
        {
        return[
        'name.required'  =>  "Il faut un nom d'image",
        'name.max' => "Maximum :max caractères",
        'image.required'  =>  "Il faut une image",
        'image.max' => "L'image ne peut pas dépasser 20Mb",
        'image.dimensions' => "Il faut une image a 1920 de largeur et 1274 de hauteur"
            ];
        }
    
}
