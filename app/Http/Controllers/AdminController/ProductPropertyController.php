<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{

    public function index(Product $product)
    {
        return view('admin.productProperty.index', [
            'product' => $product,
        ]);
    }


    public function create(Product $product)
    {
        return view('admin.productProperty.create', [
            'product' => $product,
            'propertyGroups' => $product->category->propertyGroups,  // محصولات رابطه اش با دسته بندی ها و دسته بندی ها رابطه اش با مشخصات محصول
        ]);
    }


    public function store(Request $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        //collection filter (closure) | اگر خالی نبود خود متن بنویس اگه خالی بود بیا (سینک) اجرا کن که میاد دلیت میکنه از جدول با (کالکشن) ها ممکن میشه
        $properties = collect($request->get('properties'))->filter(function ($item) {
            if (!empty($item['value'])) {
                return $item;
            }
        });

        $product->properties()->sync($properties);  //sync همزمان هم اضافه میکنه هم آپدیت | فقط یک بار به جدول اضافه میشه دفعات بعدی آپدیت میشه
        return back()->with('success', 'عنوان ویژگی (مشخصات محصول) با موفقیت افزوده شد');
    }

}
