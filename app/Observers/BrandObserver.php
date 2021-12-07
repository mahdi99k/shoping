<?php

namespace App\Observers;

use App\Models\Brand;

class BrandObserver
{


    public function created(Brand $brand)
    {
        session()->flash("success" , " برند {$brand->name} با موفقیت افزوده شد");
    }


    public function updated(Brand $brand)
    {
        session()->flash("update" , " برند {$brand->name} با موفقیت به روزرسانی شد");
    }


    public function deleted(Brand $brand)
    {
        session()->flash("delete" , " برند {$brand->name} با موفقیت حذف شد");
    }


    public function restored(Brand $brand)
    {
        //
    }


    public function forceDeleted(Brand $brand)
    {
        //
    }


}
