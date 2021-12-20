<?php

namespace App\Http\Requests\ClientRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email',  //exists:users_,email ایمیل با ایمیل درون جدول کاربر باش
            'password' => 'required',
        ];
    }
}
