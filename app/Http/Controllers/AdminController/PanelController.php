<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PanelController extends Controller
{

    /*public function __construct()
    {
         $this->middleware(CheckPermission::class . ':view-dashboard')->only('index');  // فقط این متود اجرا شع که کل پنل
    }*/

    public function index()
    {
        /*if (!Gate::allows('view-dashboard')) {    // allows اجازه می دهد گیت که تعریف کردیم اینجا اجرا کنیم |A) ability
            abort(403);
        }*/

        /*if (Gate::denies('view-dashboard')) {                                             // برعکس define
            abort(403);
        }*/

        return view('admin.index');
    }


}
