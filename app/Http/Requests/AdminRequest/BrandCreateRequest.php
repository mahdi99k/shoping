<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class BrandCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;     // user must first loggin Go show validate
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:brands,name|max:100',
            'image' => 'required|image|mimes:png,PNG,jpg,jpeg,svg,mpeg|min:10|max:5000',
        ];
    }
}
