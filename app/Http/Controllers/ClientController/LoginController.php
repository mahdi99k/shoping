<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    //login by googleAccount
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect(); //show gmail user
    }


    public function handleProviderCallback()  //Login OR Register
    {
        try {

            $user = Socialite::driver('google')->user();  //check user is login
            $userQuery = User::query()->where('email', '=', $user->email)->first();

            if ($userQuery) {  //exist email
                auth()->login($userQuery);

            } else {     //no login website go to register
                $newUser = User::query()->create([
                    'role_id' => 2,
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => bcrypt('normal-user'),
                    'avatar' => $user->getAvatar(),
                    'google_id' => $user->getId(),
                ]);
                auth()->login($newUser);
                return redirect('/');
//              return redirect(route('client.home'));
            }

        } catch (\Exception  $e) {
            dd($e->getMessage());
        }
    }



    //---------------------------

    public function create()
    {
        return view('client.register.login.create');
    }


    public function store(LoginRequest $request)
    {
        $user = User::query()->where('email', '=', $request->get('email'))->firstOrFail();  //email exist table user
        if (!Hash::check($request->get('password'), $user->password)) {  //اگر پسوورد کاربر با پسوورد درون جدول یکی نبود
            return back()->withErrors('ایمیل یا رمز عبور مطابقت ندارد!!');
        } else {
            auth()->login($user);
            return redirect(route('client.home'))->with('loginVerified', "کاربر گرامی به وب سایت خوش آمدید");
        }

    }


}
