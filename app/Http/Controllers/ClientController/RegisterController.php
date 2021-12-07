<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function create()
    {
        return view('client.register.create');
    }


    /**
     * @throws \Exception
     */
    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
        ]);

        $user = User::generateOtp($request);  // Model USer

        return redirect(route('client.register.otp', $user));  // route  1)address view   2)parameter
    }



    public function otp(User $user)
    {
        return view('client.register.verifiedOtp', [
            'user' => $user,
        ]);
    }

    public function verifiedOtp(Request $request, User $user)
    {
        $this->validate($request, [
            'otp' => 'required|max:5|min:5|lte:99999|gte:11111',
        ]);

        // Hash::check بیا چک کن آیا عددی که هش شده مطابقه داره با رمز کاربری پسوورد
        if (!Hash::check($request->get('otp'), $user->password)) {  // اگر مخالف هم بود پسوورد که همون رمز تایید ایمیل با خود رمز تایید ایمیل
            return back()->with('errorVerified', 'کد وارد شده صحیح نمی باشد!!');
        }


        auth()->login($user);                    // کاربر لاگین میکنه
        return redirect(route('client.home'))->with('loginVerified', "کاربر گرامی به وب سایت خوش آمدید");  // home page
    }


    public function logout()
    {
        auth()->logout();
        return redirect(route('client.home'));
    }


}
