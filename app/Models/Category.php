<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

//  protected $fillable = ['parent_id' , 'title_fa' , 'title_en'];    // just column full in the table

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');  //تعداد زیادی هر دسته بندی متعلق به دسته بندی پدر
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');        // رابطه یک به چند | هر دسته پدر می تواند کلی زیر مجموعه داشته باشد
    }

    public function getAllSubCategoryProducts()  // جدول محصولات اگر آیدی قسمت کتگوری مساوی با قسمت دسته بندی ها بچه ها بیا فقط اینا نمایش بده (دسته پدر نمایش نده)
    {
        $children = $this->children()->pluck('id');  // آیدی چیلدرن قسمت دسته بندی ها بیا آیدی بگیر| پلاک یعنی اولی با دومی مقایسه کن که آیدی منحصر به فرد دومی نمیخواد
        return Product::query()->whereIn('category_id', $children)->get();  // آیدی کتکوری قسمت چیلدرن یا قسمت محصولات دسته بندی ها یکی بود
    }


}
