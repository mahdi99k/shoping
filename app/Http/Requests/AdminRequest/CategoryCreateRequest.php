<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;     // user must first loggin Go show validate
    }


    public function rules()
    {
        return [
            'title_fa' => 'required|unique:categories,title_fa|string',
            'title_en' => 'unique:categories,title_en|nullable|string',
            'parent_id' => 'nullable|string',
            'propertyGroup' => 'nullable|exists:property_groups,id',
        ];
    }

    /*public function messages()
    {
        return [
            'title_fa.required' => 'مقدار عنوان فارسی نمی تواند خالی باشد',
            'title_fa.unique' => '',
            'title_fa.string' => '',
            'title_en.unique' => 'مقدار عنوان انگلیسی باید منحصر به فرد باشد',
        ];
    }*/

}
