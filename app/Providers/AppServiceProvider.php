<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Observers\BrandObserver;
use App\Observers\CategoryObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()    // see code and do work
    {
        //
    }


    public function boot()    // execute code
    {

        // معرفی میکنیم (ویو) سایت یا ظاهر سایت کد های (بلید) که به صورت کلی از این جا (کامپکت) بشه و نخواهیم هر سری کد بنویسیم و برای تغییر دادن از این قسمت فقط انجام بدیم
        view()->composer(['client.*'], function ($view) {    // تمام روت های سمت کلایت که نیم یا اسمشون این client.*
            $view->with([
                'categories' => Category::query()->where('parent_id', '=', null)->get(),
                'brands' => Brand::all(),
            ]);
        });

        Brand::observe(BrandObserver::class);          //حالت  session observer
        Category::observe(CategoryObserver::class);   //حالت  session observer
        Paginator::useBootstrap();   // show bootsrap paginate
    }
}
