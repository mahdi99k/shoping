<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProductGalleryRequest extends FormRequest
{

    public function authorize()
    {
        return true;     // user must first loggin Go show validate
    }

    public function rules()
    {
        return [
            'file' => 'required|image|mimes:png,PNG,jpg,jpeg,svg|min:10|max:2048',
        ];
    }
}
