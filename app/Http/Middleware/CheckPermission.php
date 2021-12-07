<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{

    public function handle(Request $request, Closure $next, $permission)
    {

//      $id = optional(Auth::user())->id;
        if (!auth()->user()->role->hasPermission($permission)) {  // کاربری که لاگین کرده اگر نقشش برابر نبود خطا 403
            abort(403);
        }

        return $next($request);  // برو مرحله بعدی انجام بده
    }

}

