<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
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
        view()->composer(['client.index', 'client.products.show'], function ($view) {  // 1) view blade   2) callback
            $view->with([
                'categories' => Category::query()->where('parent_id', '=', null)->get(),
                'brands' => Brand::all(),
            ]);
        });


        Paginator::useBootstrap();   // show bootsrap paginate
    }
}
