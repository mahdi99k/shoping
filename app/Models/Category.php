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
        return $this->belongsTo(Category::class , 'parent_id');  //تعداد زیادی هر دسته بندی متعلق به دسته بندی پدر
    }

    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id');        // رابطه یک به چند | هر دسته پدر می تواند کلی زیر مجموعه داشته باشد
    }


}
