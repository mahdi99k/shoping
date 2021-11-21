<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{

    public function authorize()
    {
        return true;     // user must first loggin Go show validate
    }

    public function rules()
    {
        return [
            'value' => 'required|integer|lte:100|gte:1',      //integer عدد صحیح  |  min:1|max:100  |  lte:1|gte:100  کم و زیاد عدد بهتر
        ];
    }
}


/*

gt - greater than  | بزرگتر از
gte - greater than equal to   |  بزرگتر  مساوی از
lt - less than   |  کوچیکتر از
lte - less than equal to   |  کوچیکتر مساوی از

 */
