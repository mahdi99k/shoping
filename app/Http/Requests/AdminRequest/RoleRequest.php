<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    public function authorize()
    {
        return true;     // user must first loggin Go show validate
    }

    public function rules()
    {
        return [
            'title' => 'required',   // exists:permissions, id | حتما آیدی جدول نقش ها با جدول مجوز دسترسی یکسان باشد و دستکاری نشده باشد
            'permissions' => 'required|array|exists:permissions,id',  // exists:nametable,column
        ];
    }
}


/*
<script>

$(function () {

    $('#selectAll').click(function () {   // اگر رو این اینپوت کلیک شد بیا ...
        if ($(this).prop('checked')) {   // prop = بیا حالت فعال کردن دکمه اینپوت قرار بدهاگر کیک شد رو اینپوت غعال کردن همه
            $('.checkedAll').prop('checked', true);
            $('#disableAll').prop('checked', false);  // ائن یکی اینپوت غیرفعال کن حالت رنگ آبی
        }
    })

        $('#disableAll').click(function () {
            if ($(this).prop('checked')) {
                $('.checkedAll').prop('checked', false);
                $('#selectAll').prop('checked', false);
            }
        })

    })

</script>
*/


