<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;     //The user must .login first
    }

    public function rules(): array
    {

        if (request()->routeIs('offer.store')) {
            return [

                'code' => 'required|unique:offers,code',
                'start_at' => 'required|jdate|before:end_at',       //before:end_at قبل از ستون پایان کد تخفیف | date نوع تاریخ
                'end_at' => 'required|jdate|after:start_at',       //after:start_at بعد از ستون شروع کد تخفیف
            ];

        }else {

            return [
                'code' => 'required',
                'start_at' => 'required|jdate|before:end_at',
                'end_at' => 'required|jdate|after:start_at',
            ];

        }

    }
}
