<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{


    public function created(Category $category)
    {
        session()->flash('success', "دسته بندی {$category->title_fa} با موفقیت افزوده شد");
    }


    public function updated(Category $category)
    {
        session()->flash('update' , "دسته بندی {$category->title_fa} با موفقیت به روزرسانی شد");
    }


    public function deleted(Category $category)
    {
        session()->flash('delete' , "دسته بندی {$category->title_fa} با موفقیت حذف شد");
    }


    public function restored(Category $category)
    {
        //
    }


    public function forceDeleted(Category $category)
    {
        //
    }


}
