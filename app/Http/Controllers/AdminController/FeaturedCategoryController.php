<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FeaturedCategory;
use Illuminate\Http\Request;

class FeaturedCategoryController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.featuredCategory.create', [
            'categories' => Category::query()->where('parent_id', '=', null)->get(),    //فقط دسته بندی پدر پون حتالت نال و دسته ای نداره
            'featured_category' => FeaturedCategory::query()->first(),                                                               // one data
        ]);
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request , [
            'parent_id' => 'required|string|exists:categories,id',       //باید وجود داشته باشه آیدی در دسته بندی ها مطابق آیدی این
        ]);

        FeaturedCategory::query()->delete();      // رکورد های قبلی که میاد سمتت حذف کن | شبیه sync
        FeaturedCategory::query()->create([
            'category_id' => $request->get('parent_id'),  //input name = $request->get('parent_id')
        ]);
        return back()->with('success' , 'دسته بندی ویژه با موفقیت افزوده شد');
    }


    public function show(FeaturedCategory $featuredCategory)
    {
        //
    }


    public function edit(FeaturedCategory $featuredCategory)
    {
        //
    }


    public function update(Request $request, FeaturedCategory $featuredCategory)
    {
        //
    }


    public function destroy(FeaturedCategory $featuredCategory)
    {
        //
    }


}
