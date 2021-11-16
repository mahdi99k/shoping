<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;     // user must first loggin Go show validate
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'category_id' => 'required|exists:categories,id',             // exists:categories, id | حتما آیدی جدول دسته بندی ها با جدول محصولات یکسان باشد و دستکاری نشده باشد
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|integer|min:1000',                     // integer فقط عدد باشه
            'slug' => 'required|unique:products,slug|alpha_dash',      // alpha_dash  =>  space is _ | جاهای خالی با _ جدا میکنه
            'description' => 'required|max:2000',
            'image' => 'required|image|mimes:png,PNG,jpg,jpeg,svg,mpeg|min:10|max:1024',
        ];
    }
}
