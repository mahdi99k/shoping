<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('client.profile.myProfile.edit');
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:40'
        ]);

//      if ($request->get('name')) {   //برای تغییر اسم کاربر اگر درخواست به سمت نام بود
        auth()->user()->update([
            'name' => $request->get('name'),
        ]);
        session()->flash('successName' , 'نام کاربری جدید با موفقیت ثبت شد');
        return redirect(route('client.myProfile.edit'));
    }


    public function changePassword_edit()
    {
        return view('client.profile.myProfile.changePassword.edit');
    }


    public function changePassword_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|same:password_confirm|min:6|max:25',
            'password_confirm' => 'required',
        ]);

        $user = auth()->user();
        if (!Hash::check($request->get('old_password'), $user->password)) {   //رمز قدیم با رمز دیتابیس یکی باش البته کاربر لاگین شده برابر نبود
            return back()->withErrors('رمز فعلی مطابقت ندارد !');

        } else {
            $user->update([
                'password' => bcrypt($request->get('password')),
            ]);
            return redirect(route('client.myProfile.edit'))->with('successPassword' , 'رمز عبور جدید با موفقیت ثبت شد');
        }

    }


}
