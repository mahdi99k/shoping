<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ProductCreateRequest;
use App\Http\Requests\AdminRequest\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
//      $products = Product::all();                     // for one property is good
        return view('admin.products.index', [     //  for more than one property is good
//          'products' => Product::withTrashed()->get(),
            'products' => Product::paginate(8),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }


    public function store(ProductCreateRequest $request)
    {
        $file = $request->file('image');
        $path = $file->storeAs('public/image-products', $file->getClientOriginalName());

        Product::query()->create([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'price' => $request->get('price'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'image' => $path,
        ]);

        return redirect(route('product.create'))->with('success', 'محصول با موفقیت افزوده شد');
//      return redirect()->route('product.create');
//      return redirect('product/create');
//      return back();
    }


    public function show(Product $product)
    {
        //
    }


    public function edit($id)
    {
//      $products = Product::query()->findOrFail($id);
        return view('admin.products.edit', [
            'product' => Product::query()->findOrFail($id),
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }


    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::query()->findOrFail($id);
        $pathImage = $product->image;
        if ($request->hasFile('image')) {
            unlink(str_replace('public/image-products', 'storage/image-products', $product->image));
            $file = $request->file('image');
            $pathImage = $file->storeAs('public/image-products', $file->getClientOriginalName());
        }

        // 1) اگر اسلاگ برابر بود با ی اسلاگ درون جدول | 2) اگر آیدی این اسلاگ با اسلاگ درون جدول فرق میکرد یعنی دوتا بودن | 3) اگر وجود داشت
        $slugUnique = Product::query()->where('slug', '=', $request->get('slug'))->where('id', '!=', $product->id)->exists();
        if ($slugUnique) {
            return back()->withErrors('اسلاگ انتخابی تکراری است');   // withErrors | براساس خطایی که درون بلید ادیت میزاریم
        }

        $product->update([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'brand_id' => $request->get('brand_id'),
            'price' => $request->get('price'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'image' => $pathImage,
        ]);
        return redirect(route('product.create'))->with('update', 'محصول با موفقیت به روزرسانی شد');
    }


    public function destroy($id)
    {
        $product = Product::query()->findOrFail($id);
        unlink(str_replace('public/image-products', 'storage/image-products', $product->image));

        Product::destroy($id);
//      Product::query()->where('id', '=', $id)->delete();
//      $product->delete();
        return redirect(route('product.create'))->with('delete', 'محصول با موفقیت حذف شد');
    }


}
