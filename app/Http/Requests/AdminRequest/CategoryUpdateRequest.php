<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;           // user must first loggin Go show validate
    }

    public function rules()
    {
        return [
            'title_fa' => 'required|unique:categories,title_fa|string',
            'title_en' => 'nullable|string',
            'parent_id' => 'nullable|string',
        ];
    }
}
