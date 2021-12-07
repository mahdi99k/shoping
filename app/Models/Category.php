<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

//  protected $fillable = ['parent_id' , 'title_fa' , 'title_en'];    // just column full in the table

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');  //تعداد زیادی هر دسته بندی متعلق به دسته بندی پدر
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');        // رابطه یک به چند | هر دسته پدر می تواند کلی زیر مجموعه داشته باشد
    }


    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);                    // میتونه داشته باشد تعداد زیادی محصول
    }


    public function getAllSubCategoryProducts()  // جدول محصولات اگر آیدی قسمت کتگوری مساوی با قسمت دسته بندی ها بچه ها بیا فقط اینا نمایش بده (دسته پدر نمایش نده)
    {
        $childrenIds = $this->children()->pluck('id');  // آیدی چیلدرن قسمت دسته بندی ها بیا آیدی بگیر| پلاک یعنی اولی با دومی مقایسه کن که آیدی منحصر به فرد دومی نمیخواد
        return Product::query()->whereIn('category_id', $childrenIds)->orWhere('category_id', '=', $this->id)->get();
        // آیدی کتکوری قسمت چیلدرن یا قسمت محصولات دسته بندی ها یکی بود | 2-اگر کلیدخارجی اگر مساوی بود با پرنت کتگوری ها نمایش بده
    }

    //-------------------------------- PropertyGroup in (relationship) Category

    public function propertyGroups(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PropertyGroup::class);  // متعلق به تعداد زیادی یا چند تایی به جدول دسته بندی ها یا کتگوری
    }

    public function hasPropertyGroup($propertyGroup): bool  // edit check exist property group
    {
        return $this->propertyGroups()->where('property_group_id' , '=' , $propertyGroup->id)->exists();  // آیدی جدول رابط با آیدی جدول پراپرتی گروپ
    }


}

