<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.roles.index', [
            'roles' => Role::paginate(10),
            'permissions' => Permission::all(),
        ]);
    }


    public function store(RoleRequest $request)
    {
        $role = Role::query()->create([
            'title' => $request->get('title'),
        ]);
        $role->permissions()->attach($request->get('permissions'));    // پرمیژن ها اضافه مینکه درون نقش ها | permissions اسم اینپوت درون create نقش
        return redirect(route('role.create'))->with('success', 'نقش با موفقیت افزوده شد');
//      return redirect()->route('role.create');
//      return redirect('role/create');
//      return back();
    }


    public function show(Role $role)
    {
        //
    }


    public function edit($id)
    {
        $role = Role::query()->findOrFail($id);
        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }


    public function update(RoleRequest $request, $id)
    {
        $role = Role::query()->findOrFail($id);
        $role->update([
            'title' => $request->get('title'),
        ]);
        $role->permissions()->sync($request->get('permissions'));
        return redirect(route('role.create'))->with('update' , 'نقش با موفقیت به روزرسانی شد');
    }


    public function destroy($id)
    {
        $role = Role::query()->findOrFail($id);
        $role->permissions()->detach();
        $role->delete();
        return back();
    }


}
