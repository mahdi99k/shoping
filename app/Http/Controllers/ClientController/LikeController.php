<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }


    public function index()
    {
        return view('client.profile.index', [
            'products' => auth()->user()->likes,
        ]);
    }


    public function store(Request $request, Product $product)
    {

        if (!auth()->check()) {                                                                       // user not login
            return response(['msg' => 'user is not logged in!'], 500);
        }

        auth()->user()->likeProduct($product);   // sync اگر بیشتر روی لایک کلیک کرد این همگام سازی بشه نه دیتا تو دیتابیس ذخیره بشه مثل (اتچ)
        return response(['likes_count' => auth()->user()->likes->count()], 200);
    }


    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->likes()->detach($product);                            // کاربری که لاگین هست بیاد لایکش حذف بشه از قسمت محصولات
        return back()->with('delete' , 'لیست علاقه مندی با موفقیت حذف شد');
    }

}
