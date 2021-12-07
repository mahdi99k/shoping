<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\BrandCreateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {

    }


    public function create()
    {

        /*if (!\Gate::allows('create-brand')) {
            abort('403');
        }*/

        $brands = Brand::query()->paginate(4);
        return view('admin.brands.index', compact('brands'));
    }


    public function store(BrandCreateRequest $request)
    {
//      $path = $request->file('image')->store('image-brands');                                  // store میره پوشه استور و به صورت هش شده ذخیره
//      $path = $request->file('image')->storeAs('image-brands' , 'hello.jpg');                // اولی مسیر استور | دومی اسم تمامی عکس ها چی ذخیره بشه
        $path = $request->file('image')->storeAs( // اولی مسیر استور | دومی اسم عکس
            'public/image-brands', $request->file('image')->getClientOriginalName()
        );
        Brand::query()->create([
            'name' => $request->get('name'),
            'image' => $path,
        ]);
        /* session created observer */
        return redirect(route('brands.create'));
//      return redirect(route('brands.create'))->with('success', 'برند با موفقیت افزوده شد');
//      return redirect()->route('brands.create');
//      return redirect('brands/create');
//      return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $brand = Brand::query()->findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $brand = Brand::query()->findOrFail($id);
        $path = $brand->image;      // بیا عکس خالی بود عکس قبلی بگیر

        if ($request->hasFile('image')) {                      // اگر عکسی وجود داشت | file_exists
            unlink(str_replace('public/image-brands', 'storage/image-brands', $brand->image));
            $path = $request->file('image')->storeAs(
                'public/image-brands', $request->file('image')->getClientOriginalName()
            );
        }

        $brand->update([
            'name' => $request->get('name'),
            'image' => $path,
        ]);

        /* session updated observer */
        return redirect(route('brands.create'));
//      return redirect(route('brands.create'))->with('update', 'برند با موفقیت به روزرسانی شد');
    }


    public function destroy($id)
    {
        $brand = Brand::query()->findOrFail($id);
        unlink(str_replace('public/image-brands', 'storage/image-brands', $brand->image));

//      Brand::destroy($id);
//      Brand::query()->where('id', '=', $id)->delete();
//      Brand::query()->findOrFail($id)->delete();
        $brand->delete();
        /* session deleted observer */
        return redirect(route('brands.create'));
//      return redirect(route('brands.create'))->with('delete', 'برند با موفقیت حذف شد');
    }


}
