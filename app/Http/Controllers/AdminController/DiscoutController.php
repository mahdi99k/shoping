<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscoutController extends Controller
{


    public function index()
    {
        //
    }


    public function create(Product $product)
    {
        return view('admin.discounts.create', [
            'product' => $product,
        ]);
    }


    public function store(Product $product, DiscountRequest $request)
    {
//      $product->addDiscount($request);


        if (!$product->discount()->exists()) {    // تخفیفی وجود نداشت | discount() یک کوئری زدیم تا مقداری اضافه بشه

            $product->discount()->create([
                'product_id' => $product->id,
                'value' => $request->get('value'),
            ]);

        } else {                           // اگر تخفیفی وجود داشت بیا آپدیت کن | بدون پرانتز میاد فقط یک رکورد از جدول در نظر میگیره آاپدیت کنه discount
            $product->discount->update([
                'product_id' => $product->id,
                'value' => $request->get('value'),
            ]);
        }
        return redirect(route('product.create'))->with('success', 'تخفیف محصول با موفقیت انجام شد');
//      return redirect()->route('product.create');
//      return redirect('product/create');
//      return back();
    }


    public function show(Discount $discount)
    {
        //
    }


    public function edit(Product $product, Discount $discount)
    {
        return view('admin.discounts.edit', [
            'product' => $product,
            'discount' => $discount,
        ]);
    }


    public function update(Product $product, DiscountRequest $request)
    {
//      $product->updateDiscount($request);
        $product->discount()->update([
            'product_id' => $product->id,
            'value' => $request->get('value'),
        ]);
        return redirect(route('product.create'));
    }


    public function destroy(Product $product, Discount $discount)
    {
        $product->deleteDiscount($discount);
        return redirect(route('product.create'))->with('deleteDiscount', 'تخفیف محصول با موفقیت حذف شد');
    }


}
