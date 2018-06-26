<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTag extends FormRequest
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
        ];
    }

        public  function  messages()
        {
        return[
            'name.required'  =>  "Il faut un nom de tag",
            'name.max' => "Maximum :max caractères",
            ];
        }
}
