<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\PropertyGroupRequest;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.propertyGroup.index' , [
            'propertyGroup' => PropertyGroup::paginate(5),
        ]);
    }


    public function store(PropertyGroupRequest $request)
    {
        PropertyGroup::query()->create([
            'title' => $request->get('title'),
        ]);
        return redirect(route('propertyGroup.create'))->with('success' , 'گروه مشخصات محصول با موفقیت افزوده شد');
//      return redirect()->route('properties.create');
//      return redirect('properties/create');
//      return back();
    }


    public function show(PropertyGroup $properyGroup)
    {
        //
    }


    public function edit($id)
    {
        $properyGroup = PropertyGroup::query()->findOrFail($id);
        return view('admin.propertyGroup.edit' , [
            'property' => $properyGroup ,
        ]);
    }


    public function update(Request $request , $id)
    {
        $properyGroup = propertyGroup::query()->findOrFail($id);
        $properyGroup->update([
           'title' => $request->get('title' , $properyGroup->title),  // 1)name  2)default
        ]);
        return redirect(route('propertyGroup.create'))->with('update' , 'گروه مشخصات محصول با موفقیت به روزرسانی شد');
    }


    public function destroy($id)
    {
        $properyGroup = PropertyGroup::query()->findOrFail($id);
        $properyGroup->properties()->delete();  // بایاد از جدول زیرمجموعه مشخصات حذف کنه
        $properyGroup->delete();
//      PropertyGroup::destroy($id);
//      PropertyGroup::query()->where('id' , '=' , $id)->delete();
//      PropertyGroup::query()->findOrFail($id)->delete();
        return redirect(route('propertyGroup.create'))->with('delete' , 'گروه مشخصات محصول با موفقیت حذف شد');

    }


}
