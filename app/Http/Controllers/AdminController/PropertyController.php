<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.properties.index', [
            'properties' => Property::paginate(5),
            'propertyGroup' => PropertyGroup::all(),
        ]);
    }


    public function store(PropertyRequest $request)
    {
        Property::query()->create([
            'title' => $request->get('title'),
            'property_group_id' => $request->get('property_group_id'),
        ]);
//      Property::query()->create($request->validated());

        return redirect(route('properties.create'))->with('success', 'زیر دسته گروه مشخصات با موفقیت افزوده شد');
//      return redirect()->route('properties.create');
//      return redirect('properties/create');
//      return back();
    }


    public function show(Property $property)
    {
        //
    }


    public function edit($id)
    {
        $property = Property::query()->findOrFail($id);
        return view('admin.properties.edit', [
            'property' => $property,
            'propertyGroup' => PropertyGroup::all(),
        ]);
    }


    public function update(PropertyRequest $request, $id)
    {
        $property = Property::query()->findOrFail($id);
        $property->update($request->validated());  // تمام متغیر هایی که درون ولیدیت ریکوست خودکار تشخیص میده آپدیت میکنه جز عکس
        return redirect(route('properties.create'))->with('update', 'زیر دسته گروه مشخصات با موفقیت به روزرسانی شد');
    }


    public function destroy($id)
    {
        $property = Property::query()->findOrFail($id);
        $property->delete();
//      Property::query()->where('id' , '=' , $id)->delete();
//      Property::query()->findOrFail($id)->delete();
//      Property::destroy($id);
        return redirect(route('properties.create'))->with('delete', 'زیر دسته گروه مشخصات با موفقیت حذف شد');
    }


}
