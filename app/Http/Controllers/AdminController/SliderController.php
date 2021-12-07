<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.sliders.index', [
            'sliders' => Slider::all(),
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'link' => 'required|url|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|between:10,3072',
            'alt' => 'required|string|max:100',
        ]);

        $file = $request->file('image');
        $pathImage = $file->storeAs('public/image-sliders/', $file->getClientOriginalName());// اولی مسیر استور | دومی اسم تمامی عکس ها چی ذخیره بشه
        Slider::query()->create([
            'link' => $request->get('link'),
            'image' => $pathImage,
            'alt' => $request->get('alt'),
        ]);

        return redirect(route('slider.create'))->with('success', 'اسلایدر با موفقیت افزوده شد');
//      return redirect()->route('slider.create');
//      return redirect('slider/create');
//      return back();
    }


    public function show(Slider $slider)
    {
        //
    }


    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', [
            'slider' => $slider,
        ]);
    }


    public function update(Request $request, Slider $slider)
    {
        $pathImage = $slider->image;                               // بیا عکس خالی بود عکس قبلی بگیر

        if ($request->hasFile('image')) {                      // اگر عکسی وجود داشت | file_exists
            unlink(str_replace('public/image-sliders/' , 'storage/image-sliders/' , $slider->image)); // قبلش پاک میکنه
            $file = $request->file('image');
            $pathImage = $file->storeAs('public/image-sliders/' , $file->getClientOriginalName());
        }

        $slider->update([
            'link' => $request->get('link'),
            'image' => $pathImage,
            'alt' => $request->get('alt'),
        ]);
        return redirect(route('slider.create'))->with('update' , 'اسلایدر با موفقیت به روزرسانی شد');
    }


    public function destroy(Slider $slider)
    {
//      unlink(str_replace('public/image-sliders/' , 'storage/image-sliders/' , $slider->image));
        Storage::delete($slider->image);                 // image delete
        $slider->delete();
//      Slider::destroy($id);
//      Slider::query()->findOrFail($id)->delete();
//      Slider::query()->where('id' , '=' , $id)->delete();
        return redirect(route('slider.create'))->with('delete' , 'اسلایدر با موفقیت حذف شد');
    }
}
