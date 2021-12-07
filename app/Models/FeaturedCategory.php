<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'category_id';
    public $incrementing = false;                                               //id Auto Increment = false

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);   // متعلق به یک جدول دسته بندی ها
    }

    public static function getCategory()
    {
        return FeaturedCategory::query()->first()->category;              //بیا فقط یک دسته بندی ویژه بگیر و رابطه اش با دسته بندی ها
    }

}
