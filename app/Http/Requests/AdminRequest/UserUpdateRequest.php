<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|max:255',
            'role_id' => 'required|exists:roles,id',          // security , the must id with table role equal
        ];
    }
}
