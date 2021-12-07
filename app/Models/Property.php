<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function propertyGroup(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PropertyGroup::class , 'property_group_id');  // هر زیر عنوان متعلق به یک گروه مشخصات چون (belongsTo) و میتونه تعداد زیادی باشد
    }

    //------------------- relationship *Product & property
    public function products()
    {
        //withTimestamps مثل قبلی برای اضافه کردن تایم اسمپ //withPivot جدول (پیوت) فقط برای آیدی ها این جا (ولیو) اضافی با این اضافه میکنیم در نظر بگیره
        return $this->belongsToMany(Product::class)->withPivot(['value'])->withTimestamps();
    }


    public function getValueForProduct($product)       // get value (product_properties)
    {
        $productPropertyQuery = $this->products()->where('product_id' , '=' , $product->id); // رابطه با جدول محصول و اگر آیدی محصول با آیدی جدول رابط یکی بود
        if (!$productPropertyQuery->exists()) {
            return null;
        }
        return $productPropertyQuery->first()->pivot->value;  // بیا بگیر از طریق pivot (ولیو) مشخصات چون یکی از (فرست) استفاده میکنیم
    }

}
