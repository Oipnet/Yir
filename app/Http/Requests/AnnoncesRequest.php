<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnoncesRequest extends FormRequest
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
       $rules =  [
            "name" => "required|min:2",
            "price" => "required|min:2",
             "avatar" => "required|image",
            "categories_id" => "required|exists:categories,id",
           "description" => "required|min:20"
        ];
        if($this->method() == "PUT"){
            $rules['avatar'] = 'image';
        }
        return $rules;
    }
}
