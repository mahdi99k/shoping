<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CategoryCreateRequest;
use App\Http\Requests\AdminRequest\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {

        /*if (Gate::denies('create-category')) {  // Gate::denies() برعکی اول خطا نمایش بعد حالت صحیح
            abort(403);
        }*/

        /*$categories = Category::query()->paginate(6);     // for category list صفحه بندی
        $selectCategory = Category::all();                       // for select category انتخاب دسته پدر*/
        return view('admin.categories.index', [
            'categories' => Category::query()->paginate(6),
            'selectCategory' => Category::all(),
            'propertyGroup' => PropertyGroup::all(),
        ]);
    }


    public function store(CategoryCreateRequest $request)
    {
        $category = Category::query()->create([
            'parent_id' => $request->get('parent_id'),
            'title_fa' => $request->get('title_fa'),
            'title_en' => $request->get('title_en'),
        ]);
        $category->propertyGroups()->attach($request->get('propertyGroup'));

        /* session created observer */
        return redirect()->route('category.create');
//      return redirect()->route('category.create')->with('success', 'دسته بندی با موفقیت افزوده شد'); //with() -> session   اولی اسم سشن  دومی متن آلرت نمایشی
//      return redirect(route('category.create'));
//      return  redirect('category/create');
//      return back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
//      $category = Category::findOrFail($id);
//      $categories = Category::all();
        return view('admin.categories.edit', [
            'category' => Category::findOrFail($id),
            'categories' => Category::all(),
            'propertyGroup' => PropertyGroup::all(),
        ]);
    }


    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::query()->findOrFail($id);
        $category->propertyGroups()->sync($request->get('propertyGroup'));

        // 1) اگر عنوان فارسی برابر بود با ی عنوان فارسی درون جدول | 2) اگر آیدی این عنوان فارسی با عنوان فارسی درون جدول فرق میکرد یعنی دوتا بودن | 3) اگر وجود داشت
        $title_faUnique = Category::query()->where('title_fa', '=', $request->get('title_fa'))  // قبل از ساختن باشه
        ->where('id', '!=', $category->id)->exists();
        if ($title_faUnique) {
            return back()->withErrors(['عنوان فارسی دسته بندی تکراری است']);   // withErrors | برای بخش خطا ها با فورایچ
        }

        $category->update([
            'parent_id' => $request->get('parent_id'),
            'title_fa' => $request->get('title_fa'),
            'title_en' => $request->get('title_en'),
        ]);

        /* session updated observer */
        return redirect(route('category.create'));
//      return redirect(route('category.create'))->with('update', 'دسته بندی با موفقیت به روزرسانی شد');
//      return  redirect()->route('category.create');
//      return redirect('category/create');
    }


    public function destroy(Category $category, $id)
    {
//     Category::destroy($id);
        $category->propertyGroups()->detach();   // میاد جدول رابط مشخصات پاک میکنه
        Category::findOrFail($id)->delete();
        /* session deleted observer */
        return redirect(route('category.create'));
//      return redirect(route('category.create'))->with('delete', 'دسته بندی با موفقیت حذف شد');
    }


}
