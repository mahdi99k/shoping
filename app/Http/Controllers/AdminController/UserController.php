<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.users.index', [
            'users' => User::query()->paginate(10),
            'role' => Role::all(),
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }


    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);
//      dd($request->all());
        $isEmailUnique = User::query()->where('email', '=', $request->get('email'))->where('id', '!=', $user->id)->exists();
        if ($isEmailUnique) {
            return back()->withErrors(['ایمیل انتخابی تکراری است!']);
        }

        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role_id'),
        ]);
        return redirect(route('user.create'))->with('update', 'کاربر با موفقیت به روزرسانی شد');
    }


    public function destroy($id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return redirect(route('user.create'))->with('delete', 'کاربر با موفقیت حذف شد');
    }


}
