<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'property_group_id' => 'required|string|exists:property_groups,id',  // exist in table database (property_groups,id)
        ];
    }
}
