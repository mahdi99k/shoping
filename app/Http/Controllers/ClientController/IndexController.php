<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FeaturedCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        /*
        $categories = Category::query()->where('parent_id', '=', null)->get();            // اونایی که دسته پدر نیستن یا (نال) هستن تو منو نمایش نده
        $brands = Brand::all();
        return view('client.index' , compact('categories' , 'brands')); */
        $slider = Slider::query()->orderBy('id', 'desc')->take(5)->skip(0)->get();
        return view('client.index', [
            'sliders' => $slider,
            'featuredCategory' => FeaturedCategory::getCategory(),             //بیا فقط یک دسته بندی ویژه بگیر و رابطه اش با دسته بندی ها
        ]);
    }

}
