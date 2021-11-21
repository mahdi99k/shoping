<?php


use App\Http\Controllers\AdminController\BrandController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\DiscoutController;
use App\Http\Controllers\AdminController\GalleryController;
use App\Http\Controllers\AdminController\PanelController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\AdminController\RoleController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\ClientController\ProductController as ClientProductController;
use App\Http\Controllers\ClientController\IndexController;
use Illuminate\Support\Facades\Route;

/*
 --------------------------------------------------------------------------
 *route:list  --->  php artisan route:list     (show route)
--------------------------------------------------------------------------
--------------------------------------------------------------------------
 *controller  --->  php artisan make:controller SliderController   -r OR --resource   (name)
 *controller  --->  php artisan make:controller Administrator\SliderController   -r   (name)
--------------------------------------------------------------------------
--------------------------------------------------------------------------
 *model  --->  php artisan make:model Post  -mcr      (name)
 *model  --->  php artisan make:model Country --all.txt   (name)  ماگرشن , کنترلر , ریسورس کنترلر , فکتوری , سییدر
--------------------------------------------------------------------------
--------------------------------------------------------------------------
 *migration  --->  php artisan make:migration create_posts_table  --create=posts     (name)
 *migration  --->  php artisan make:migration update_posts_table  --table=posts      (name)
 *migration  --->  php artisan make:migration update_posts_new_table  --table=posts  (name)
 *migrate    --->  php artisan migrate             (create migrate table)
 *migrate    --->  php artisan migrate:status      (show table)
 *migrate    --->  php artisan migrate:rollback   (--step=2)
 **migrate   --->  php artisan make:migration add_role_to_user
 **migrate   --->  php artisan make:migration add_role_to_users             // رابطه بین دو تا جدول که فاصله دارن مثل یوزر و رول
--------------------------------------------------------------------------
--------------------------------------------------------------------------
 *request   --->  php artisan make:request createSliderRequest   (name) OR updateSliderRequest
 **request   --->  php artisan make:request AdminRequest\SliderCreateRequest   (name) OR SliderUpdateRequest *webamooz*
--------------------------------------------------------------------------
--------------------------------------------------------------------------
 *seedet    --->  php artisan make:seeder SliderTableSeeder
 **seedet   --->  php artisan make:seeder PermissionSeeder
 **migrate   --->  php artisan migrate --seed                           // جدول همراه سییدر ساخته میشه
 **migrate   --->  php artisan migrate:fresh --seed                       // جدول همراه سییدر ساخته میشه و پاک میشه کل دیتا دوباره ساخته میشه
 *seed      --->  php artisan db:seed  --class=SliderTableSeeder  (--class) Seed the database with fill records
 *seed      --->  php artisan db:seed //وقتی که سییدر نداریم و فکتوری کافی و میش از طریق دیتابیس سییدر و با اسم مادل دیتا فیک بسازیم و تو فراخوانی اسم مادل نمیاریم مثل این کد
--------------------------------------------------------------------------
--------------------------------------------------------------------------
 *factory   --->  php artisan make:factory --model=Slider   (mame)  خودش فکتوری اضافه می کنه
--------------------------------------------------------------------------
--------------------------------------------------------------------------
 *policy    --->  php artisan make:policy --model=Post PostPolicy  (name)
--------------------------------------------------------------------------
 *component  --->  php artisan make:component AlertCreate    (name)
--------------------------------------------------------------------------
 *middleware --->  php artisan make:middleware checkParam    (name)
--------------------------------------------------------------------------
*down       ---->  php artisan down     (503 SERVICE UNAVAILABLE)  ,  تمام مسیر ها میبنده   |  برای تغییرات توی سایت
*up         ---->  php artisan up       Application is now live   آزاد میکنه  free
--------------------------------------------------------------------------



-------------------------------------------------------------------------- Laravel Mix(webpack)
 *npm  --->  npm init**            (package.json)
 *npm  --->  npm install**         (node.module)
 *npm  --->  npm run dev**         (app.js)            app.js هر دفعه آپدیت در (وب پک) و ساخت فایل
 *npm  --->  npm run prod          (app.min.js)        law file حجم کم
 *npm  --->  npm run watch         (online)            تغییرات جدید کد ها آنلاین اضافه میکنه هر وقت کدی بزنی درون مسیری که بخواهیم اضافه میشه
--------------------------------------------------------------------------

--------------------------------------------------------------------------  Laravel ui(bootstrap)
1)  *composer require laravel/ui                                                     // ui نصب لاراول
2)  *php artisan ui bootstrap                                                       // install bootstrap in project
3)  *Please run   "npm install"   to compile your fresh scaffolding.               // نصب نودماژول پگیج هایی اضافه کنه به دوره
4)  *npm install --save-dev webpack-cli                                           //  npm run dev میزنی  |  بعدش npm install  این مرحله بعد از
5)  *Please run   " npm run dev"   to compile your fresh scaffolding.            // public app.css, app.js اضافه شد bootstrap آپدیت اضافه کردن پکیج های جدید به پروژه
6)  *npm run prod  **اختیاری**                                                    // public  app.css,app.js  |  app.min.css مرحله اختباری برای کم کردن حجم فایل ها مثل
--------------------------------------------------------------------------

--------------------------------------------------------------------------  laravel auth(login)
1)  *composer require laravel/ui  (--dev)                                            // ui نصب لاراول
2)  *php artisan ui vue --auth                                                      // install vue --auth in project
3)  *Please run   " npm install "   to compile your fresh scaffolding.             //  نصب نودماژول پگیج هایی اضافه کنه به دوره
4)  *npm install --save-dev webpack-cli                                          //  npm run dev میزنی  |  بعدش npm install  این مرحله بعد از
5)  *Please run   " npm run dev"   to compile your fresh scaffolding.           // public app.css, app.js اضافه شد bootstrap آپدیت اضافه کردن پکیج های جدید به پروژه
6)  *npm run prod  **اختیاری**                                                   // public  app.css,app.js  |  app.min.css مرحله اختباری برای کم کردن حجم فایل ها مثل
--------------------------------------------------------------------------


// برای وقتی که پروژه تازه نصب کردیم و هیچی نصب نداریم اول نصب یو آی بعد بوت استرپ و بعدش آتنتیکیشن
--------------------------------------------------------------------------Start Project  laravel auth(login)  پروژه خام و اولیه قبل نصب نود ماژول و بوت استرپ
1)  *composer require laravel/ui  (--dev)                                          // ui نصب لاراول
2)  *Please run   " npm install "   to compile your fresh scaffolding.            //  نصب نودماژول پگیج هایی اضافه کنه به دوره
3)  *npm install --save-dev webpack-cli                                          //  npm run dev میزنی  |  بعدش npm install  این مرحله بعد از
4)  *Please run   " npm run dev "   to compile your fresh scaffolding.          // public app.css, app.js اضافه شد bootstrap آپدیت اضافه کردن پکیج های جدید به پروژه

5)  *php artisan ui bootstrap                                                     // install bootstrap in project
6)  *Please run   " npm install "   to compile your fresh scaffolding.           // نصب نودماژول پگیج هایی اضافه کنه به دوره
7)  *npm install --save-dev webpack-cli                                         //  npm run dev میزنی  |  بعدش npm install  این مرحله بعد از
8)  *Please run   " npm run dev "   to compile your fresh scaffolding.         // public app.css, app.js اضافه شد bootstrap آپدیت اضافه کردن پکیج های جدید به پروژه

9)  *php artisan ui vue --auth                                                  // install vue --auth in project
6)  *Please run   " npm install "   to compile your fresh scaffolding.         // نصب نودماژول پگیج هایی اضافه کنه به دوره
7)  *npm install vue-loader                                                  //  npm run dev میزنی  |  بعدش npm install  این مرحله بعد از
8)  *Please run   " npm run dev "   to compile your fresh scaffolding.       // public app.css, app.js اضافه شد bootstrap آپدیت اضافه کردن پکیج های جدید به پروژه
10)  *npm run prod  **اختیاری**                                                // public  app.css,app.js  |  app.min.css مرحله اختباری برای کم کردن حجم فایل ها مثل
--------------------------------------------------------------------------



-------------------------------------------------------------------------- Git  دستورات
cd..                               ----->   back
ls                                 ----->   list
ls -a                              ----->   list all
ls -ah                             ----->   list all & hiiden
git status                         ----->   status change project
git add -A                         ----->   اضافه بشه همه تغییرات به قسمت صحنه یا استیج
git add -all                       ----->   اضافه بشه همه تغییرات به قسمت صحنه یا استیج
git commit -m "text"               ----->   بعد مرحله (ادد) میایم اضافه میکنیم به (کامیت) و (مسیج) یا پیام مینویسیم توضیحات در مورد تغییرات
git diff Head                      ----->   تغییراتی که تو پروژه بوده نمایش میده   |   q خارج شدن از ترمینال   |  ctr + e  خط پایانی
git restore index.html             ----->   برای این که تغییرات به حالت قبل برگرده
git checkout index.html            ----->   برای اینککه تغییرات به حالت قبل برگرده
git reset index.html               ----->   برای این که تغییرات به حالت قبل (استیج) برگرده   |  stage برای این مرحله
git restore --staged index.html    ----->   برای این که تغییرات به حالت قبل (استیج) برگرده   |  stage برای این مرحله

git log                            ----->   برای دیدن تمامی تغییرات به صورت کلی مثل اسم نویسنده و زمان و تاریخ و متن پیام (کامیت) یا مسیج
git branch                         ----->   شاخه ها و مسیر هایی که وجود داره نمایش میده مثل مستر یا فرانت
git branch database                ----->   ساختن یک شاخه یا مسیر جدید مثل فرانت یا دیتابیس
git branch -d database             ----->   حذف یک شاخه یا مسیر جدید مثل فرانت یا دیتابیس
git checkout front                 ----->   برای تغییر دادن و سوییچ کردن به یک شاخه جدید دیگه
git merge front                    ----->   merge به معنی ادغام کردن برای وصل کردن شاخه ها به یکدیگر مثل مستر و فرانت

git clone https://github.com/mahdi99k/shoping.git   --->  یک حالت دانلود که ممکن همه فایل ها نیاد | یک حالت کلون که آدرس برمیداری این کد (گیت کلون) اولش میزنی
--------------------------------------------------------------------------
*/


/* Route Website */
Route::prefix('')->group(function () {

    Route::get("/", [IndexController::class, "index"])->name('index');
    Route::get('/productDetails/{product}', [ClientProductController::class, "show"])->name('productDetails.show');

});
/* End Route Website */


/* Route BackEnd */
Route::prefix('adminPanel')->group(function () {

    Route::resource("/", PanelController::class);
    Route::resource("/category", CategoryController::class)->parameters(['category' => 'id']);
    Route::resource("/brands", BrandController::class)->parameters(['brands' => 'id']);
    Route::resource('/product', ProductController::class)->parameters(['product' => 'id']);
    Route::resource('/product.gallery', GalleryController::class);  // ساخت پارامتر برای محصول و گالری با نقطه
    Route::resource('/product.discount', DiscoutController::class);
    Route::resource('/role', RoleController::class)->parameters(['role' => 'id']);
    Route::resource('/user' , UserController::class)->parameters(['user' => 'id']);

});
/* End Route BackEnd */










// TODO product->index.blade.php   $product(update,delete) slug cgange id  AND do problem

// ---------------------------------- Laravel Shop  Lesson 49         06 : 30 (+1)    ------------------------------------


// Login email  = mahdishmshm13781999@gmail.com   password = ~(W6pvO6*Mahdi99K*1JC2^E42WT5
// GitHub email = mahdishmshm13781999@gmail.com   password = Mahdi1378@*99K
// Login shop   = mahdishmshm13781999@gmail.com   password = mahdi1378


//Auth::routes(['register' => false]);     // ریجستر یا ثبت نام غیر فعال می کنه=
// laravel mix  :  package frontEnd  ,  mix file (js,less.sass,css , vue , react all.txt file asset  mixture save in folder public)

//  <!-- --> Show Code    {{-- --}} No Show Code

/* Route::get('/404', function () {               // نمایش خطا ها    return abort(404);
}); */

//Route::group(['prefix' => 'administrator' , 'middleware' => ['auth' , 'verified']], function () {});
//Route::group(['prefix' => 'administrator' , 'middleware' => 'auth' ], function () {});


/*
@if ($errors->any())
   <div class="alert alert-danger">
   <ul>
@foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
@endforeach
   </ul>
    </div>
@endif
*/


//Route::redirect(' /posts', ' /sliders', '301');  // status two = 301 , 302

/*Route::get(' / slider /{
    id}/{
    password}', function ($id, $password) {
    return $id . " ----- " . $password;
})->where(['id' => '[0 - 9] + ', 'password' => '[a - zA - Z0 - 9] + ']);*/

/*Route::get(' / post /{username ?}/{password ?}', function ($username = null, $password = '') {
    return "<h3>my user name is : $username --- my password is : $password</h3>";
})->name('post . username . password');*/

//Route::pattern("id", "[0-9]+");  // Route::pattern  ==>  ajax id is in the all.txt Route::
//Route::pattern('password' , '[a - zA - Z0 - 9] + ');  // Route::pattern  ==>  ajax id is in the all.txt Route


//----------------------------------------------   *****  Blade  *****   ----------------------------------------------

//<a href="{{ url(' / post' , ['username' => 'mahdi' , 'password' => '1378']) }}">post</a>
//<a href="{{ route('post . user . pass' , ['username' => 'admin' , 'password' => '123']) }}">post</a>

// return view('slider . index', compact('firstName' , 'lastName' , 'age'));
// return view('slider . index', ['firstName' => $firstName, 'lastName' => $lastName, 'age' => $age]);
// return view('slider . index')->with(['firstName' => $firstName, 'lastName' => $lastName, 'age' => $age]);

//<h3>{{ $data }}</h3>                                      // security ++  , htmlspecialchars
//<h3>{!! htmlspecialchars($data) !!}</h3>                 // Can Not security
//<h3><?php echo htmlspecialchars($data); ? ></h3>     //  Can Not security , e($data)

/* **************************************** conditions
@if ($data == 20)
   <h1>{{ $data }}</h1>

@elseif($data == 2)
<h1>{{ $data }}</h1>

@else
   <h1>empty</h1>
@endif



@switch($data)
   @case(1)
   <h1>{{ $data }}</h1>
   @break

    @case(2)
    <h1>{{ $data }}</h1>
    @break

    @default           // else
    <h1>{{$data}}</h1>
    @break
@endswitch



@unless ($data == 9)      اگر 9 باش میره الس اجرا میکنه ,   ! حالت نقیض یا بر عکس
    <h1>test</h1>
@else
    <h1>empty</h1>
@endunless



@php
  $firstName = "mahdi 99k";
  $data = ['one' , 'two' , 'three' , 'four' , 'five'];
  $i = 0;
  function data($html) {
     return htmlspecialchars($html);
  }
@endphp

<h1>{{ $firstName }}</h1>



@forelse ($data as $item)
    <h1>{{ $item }}</h1>
@empty
    <h1>no data :(</h1>
@endforelse



@foreach ( $data as $item)
    <h1>{{ $item }}</h1>
@endforeach



@php
  $i=0;
@endphp
@while ($i < count($data))
    <h1>{{ $data[$i] }}</h1>
    @php($i++)
@endwhile



@for ($i =0; $i < count($data); $i++)  --}}{{-- sizeof  === count --}}{{--
    <h1>{{ $data[$i] }}</h1>
@endfor



@section('css')
{{--<link rel="stylesheet" href="{{ asset('css / custom . css') }}">--}}
    <style>
h1 {
    color: whitesmoke;
    text-align: center;
        }
    </style>
@endsection*/

/* ************************************** partials (include)


<!--  start make header  -->
@include('partials . _header' , ['data' => $data , 'firstName' => 'mahdi']) {{-- true(show)  false(not show) --}}
<!--  end make header    -->

<!--  start make slider  -->
@php($flag=true)
@includeWhen( $flag ,'partials . _slider')   {{-- 1) Allows you to true (show)   OR   false (not show)   --}}
<!--  end make slider    -->

<!--  start make offer  -->
@includeIf('partials . _offer')   {{-- 1) This partial is exist  , if not exist Not Show   --}}
<!--  end make offer    -->

/* **************************************** component & slot

<section class="col-6 offset-3 alert alert-success text-center">{{ $class }}               //alert-create
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>
</section>


@component('components . alert - create' , ['class' => 'successful' , 'title' => 'hello mahdi' ,
           'description' => 'Lorem ipsum consectetur adipisicing elit .])
@endcomponent                                 {
    {
        --1)name component    2)property component internal array  --}
}


@component('components.alert-create')    {{--1)name component    2)slot(name property component)  --}}

   @slot('class')
     success
   @endslot

   @slot('title')
      hello word!
@endslot

   @slot('description')
      Lorem ipsum dolor sit amet, consectetur adipisicing elit .
@endslot

@endcomponent


//--------------------------------------   *****  Controller & Request  *****   --------------------------------------
dd($request->input('fullname'), $request->input('_method'), $request->input('_token'));
{{csrf_token() }}          token=3wye8YLQg...
@csrf                     <input type = "hidden" name = "_token" value = "3wye8YLQg..." >
@method('delete')        {{--  <input type = "hidden" name = "_method" value = "put" > --}}

Route::resource('/slider', \App\Http\Controllers\SliderController::class)->parameters(['slider' => 'id'])
->except(['create']);     // Except(به جز) this (Not Show)   ,  ->Only(['index', 'create']) ==> just this show


dd($request->all.txt());
dd($request->input('firstName'), $request->input('lastName'), $request->input('email'), $request->input('_token'));
dd($request->firstName , $request->lastName , $request->email , $request->_token);
dd($request->get('firstName') , $request->get('lastName'));
dd($request->only(['firstName', 'lastName']));  // just this show       OR  fillable *
dd($request->except(['lastName']));  // Except(به جز) this (Not Show)    OR  guarded  *
dd($request->root());  // name Domail   OR   core ریشه و هسته
dd($request->post());  // data go post
dd($request->url());  // __DIR__  مسیر آدرس دهی

if ($request->has('firstName')) {   // Are you exist;
    dd("ok");
} else {
    dd("not ok");
}


/* ------------------- upload image

$file = $request->file('image');
if (!empty($file)) {
     $image = time() . "." . $file->getClientOriginalExtension(); //getClientOriginalName() اسم عکس , getError()  ,  getErrorMessage()
     $file->move("images/slider/", $image);
     return redirect()->route('slider.create');
     return redirect('slider/create');
     return back();
        }


//----------------------------------------------   *****  validation  *****   ----------------------------------------------

class createSliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;    // authentication =  admin login show request
    }


    public function rules()
    {
   return [
      'title' => 'required | between:5,100',                            // ['title' => 'required | min:7']  not true work error
     'email' => 'required | between:5,100 | email | unique:post',     // regex = start=/ ... end=/i  , unique:post(table)
     'password' => 'required|min:6|confirmed',                   // pass = confirmed = یکی باشد تایید پسوورد , pass-conf = same یکی باشد پسوورد
//   'password' => 'required | min:6 | required_with:password_confirm | same:required_confirmation',   // 1) الزامی با   2) یکسان
'image' => 'required | between:10,5000 | mimes:png,jpg,jpeg | dimensions:min_width=300 , min_height=400', //kilobyte 5MB,dimensions: طول و عرض عکس
     'country' => 'required | array | between:2,4',
     'comment' => 'required | string | min:5 | max:500',
     'age' => 'required | integer | boolean',                  // numeric = number  , between:min,max  , array چند مقد ار
     'date' => 'required | date',
      'url' => 'required | url',                              // url = the must address link   ,  date  به صورت زمان
 ];
    }

    public function messages()
    {
        return [
            /*
             "title.required" => "لطفا مقدار عنوان را وارد نمایید",
            "title.between" => "لطفا مقدار عنوان باید بین 5 تا 100 کاراکتر باشد",

            "email.required" => "لطفا مقدار ایمیل را وارد نمایید",
            "email.email" => "مقدار ایمیل باید درای @ باشد",
            "email.between" => "مقدار ایمیل باید بین 5 تا 100 کاراکتر می باشد",

            "image.required" => "مقدار عکس به صورت الزامی می باشد",
            "image.between" => "مقدار سایز عکس باید بین ده کیلوبایت تا 5 مگابایت باشد ",
];
}
}

// 'image' => 'required | between:10,5000 | dimensions:width=510 , height=510 ', // dimensions:width=510 , height=510 فقط این سایز نه کمتر نه بیشتر
// 'email' => 'required | between:8,100 | regex: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/i ',  // start=/ ... end=/i

// 'url' => 'required|regex: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/i', // url = the must address link
// $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
// 'url' => 'required|regex:'.$regex,



//----------------------------------------------   *****  Query builder  *****   ----------------------------------------------

"<h2>".env('DB_CONNECTION' , 'mysql')."</h2>";
"<h2>".env('DB_HOST' , '127.0.0.1')."</h2>";
"<h2>".env('DB_PORT' , '3306')."</h2>";
"<h2>".env('DB_DATABASE' , 'laravel')."</h2>";
echo env('DB_USERNAME' , 'root');
echo env('DB_PASSWORD'  , '');

$slider = DB::select('SELECT * FROM slider');
$slider = DB::table('slider')->get(['price' , 'image' , 'created_at']);     // get(['active','image])  Just This Show Data
$slider = DB::table('slider')->toSql();                                    // show code SQL
// return $slider;
$slider = DB::table('slider')->get();                                    // select * from 'slider'
return view('slider.index' , compact('slider'));


//------------------------------------------ where   شرط

//      $slider = DB::table('slider')->where('id' , '!=' , '2')->get(); // toSql()
//      $slider = DB::table('slider')->where('price' , '>=' , '1000')->get();
//      $slider = DB::table('slider')->where('id', '>=', '1')->where('price', '>', '2000')->get(); // toSql()  , && AND
//      $slider = DB::table('slider')->where('id', '>=', '4')->orWhere('price', '=', '2000')->get(); //  || OR

$slider = DB::table('slider')->where([   // () الویت پرانتز
   ['id' , '>=' , '1'] ,
   ['price' , '=' , '2000'],
])->get();

$slider = DB::table('slider')->where(function ($query) {
    $query->where('id' , '>=' , '1')->where('price' , '>=' , '2000');
})->get();

$slider = DB::table('slider')->whereBetween( 'id' , [1,3] )->get();

return view('slider.index', compact('slider'));
// dd($slider);  // collection Speed to array
// return $slider;

//------------------------------------------ find  پیدا کردن آیدی

//$slider = DB::table('slider')->find([2, 1, 3]);        // No get()  , Take the first value array (2)
$slider = DB::table('slider')->find(2);                // No get()
return $slider;
return view('slider.index', ['slider' => $slider]);
//return $slider->price;

//------------------------------------------ first   اولین مقدار نمایش

$slider = DB::table('slider')->where('id', '>=', 2)->first();       // Takes the first value
$slider = DB::table('slider')->first();
return view('slider.index', compact('slider'));                   // take the first
dd($slider->price);
//return $slider;

//------------------------------------------ pluck دو مقدار نمایش بده

$slider = DB::table('slider')->where('id', '>=', 1)
->pluck('image', 'id'); // برگردوندن دو تا جیز  اولی ستون چیو نمایش بده میچسبونیم به دومی   دومی از طریق چه چیزی بهتر ی چیز منحصر به فرد باش تکراری نباش

return view('slider.index', compact('slider'));
//return $slider;
//dd($slider);

foreach ($slider as $key => $item) {
    echo $key . "--" . $item . "<br/>";        // nothing column
}

//------------------------------------------  count , min , msx , sum ,( avg , average)

$slider = DB::table('slider')->where('id' , '>=' , 1)->get();
$slider = DB::table('slider')->count();                         // چند تا دیتا درون دیتابیس
$slider = DB::table('slider')->max('price');                   // بیشترین مقدا
$slider = DB::table('slider')->min('price');                  // کمترین مقدار
$slider = DB::table('slider')->avg('price');                  // میانگین
$slider = DB::table('slider')->average('price');             // میانگین
$slider = DB::table('slider')->sum('price');               // جمع کل اعداد

dd($slider);
return view('slider.index' , compact('slider'));

//------------------------------------------  whereDate , take skip , limit offset

$slider = DB::table('slider')->where('id', '=', 1)->exists();  // این آیدی وجود داره ؟
$slider = DB::table('slider')->where('id', '=', 5)->doesntExist();  // این آیدی وجود نداره ؟
$slider = DB::table('slider')->where('id', '>=', 1)->distinct()->get(['price']);  // دیتا های تکراری نمایش نمی دهد

//A  آخر % = میاد بررسی میکنه که اول اون جمله   |   وسط % = میاد بررسی میکنه که کل اون جمله  بهتز ^-^ |   اول % = میاد بررسی میکنه که آخرشون اون جمله
$slider = DB::table('slider')->where('caption', 'like', '%mahdi%')->get();

// برو چک کن تو این ستون همچین دیتایی هست نمایش بده اگر وجود نداشت خطا نده فقط نمایش نده مثل includeIf
$slider = DB::table('slider')->whereIn('image', ['first.jpg', 'second.jpg', 'third.jpg'])->get();
$slider = DB::table('slider')->whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->get();
$slider = DB::table('slider')->whereDate('created_at', '2021-09-29')->get();  // انتخاب یک تاریخ کامل سال ماه روز و برگردوندن دیتا اون روز
$slider = DB::table('slider')->whereDay('created_at', '2')->get(); // برگردوندن عدد یک روز و دیتا اون روز
$slider = DB::table('slider')->whereMonth('created_at', '10')->get();  // برگردوندن دیتا بر اساس تاریخ ماه
$slider = DB::table('slider')->whereYear('created_at', '2021')->get();  // برگردوندن دیتا براسا تاریخ سال
$slider = DB::table('slider')->whereColumn([  // equal value id and value price  باید مساوی باشن تا برگردونه
    ['active', 'price']
])->get();

$slider = DB::table('slider')->orderBy('id', 'desc')->take(2)->skip(0)->get();  // laravel
$slider = DB::table('slider')->orderBy('id', 'desc')->limit(3)->offset(1)->get();

//------------------------------------------  CRUD

$slider = DB::insert("INSERT INTO slider(image,caption,active,price) values (?,?,?,?)", ['ok.jpg' , 'this is ok', 1 , 7000 ]);

$slider = DB::table('slider')->insert([
   'image' => 'test.jpg',
   'caption' => 'this is test',
   'active' => 1,
   'price' => 8000,
]);

$slider = DB::table('slider')->where('id', '=', 5)->update([
     'image' => 'test.png',
     'caption' => 'this is test 7',
]);

$slider = DB::table('slider')->truncate();                      // all.txt delete table database
$slider = DB::table('slider')->where('id', '=', 8)->delete();
$slider = DB::table('slider')->whereBetween('id', [5, 9])->delete();



//*********************************************************************************************************************
                           FINISH  --------------- >  AND START  Eloquent Laravel-8
//*********************************************************************************************************************


//------------------------------------------------------ Model

protected $table = 'slider';                                          // connect table database
protected $fillable = ['image', 'caption', 'active', 'price'];       // just this full in the database
protected $guarded = ['id'];                                        // just it Not fulls in the database | Slider::create([])  |  seeder
public $timestamps = false;                                        // no have timestamps


//------------------------------------------------------ chunk         تیکه تیکه کردن و نمایش دادن   ,   دیتاهای بزرگ

//$lider = DB::table('slider')->get();
$slider = Slider::all.txt(['image', 'caption', 'active']);   // show all.txt


//$slider = Slider::where('id', '>=', '1')->chunk(3, function ($collect) {       //  روش دوم
$slider = Slider::chunk(3, function ($collect) { //1) چند تا چند تا نمایش  |  به جای اینکه همه دیتابیس بالا بیاری و فشار به سرور بیاد میای تیکه تیکه نشان میدی
   foreach ($collect as $item) {
          echo $item->image . "<br/>" . $item->caption . "<br/>" . "<br/>";
          echo $item->id . "<br/>";    // مدل دوم
          echo $item->image . "<br/>";
          echo "<h2>$item->caption</h2>";
          echo "<h2>$item->link</h2>";
   }
   echo "<hr/>";
});


$slider = Slider::where('id', '!=', 4)->get();  //toSql()

slider = Slider::where([
   ['id', '=', 1],
   ['price', '=', 1],
])->get(); //toSql()

$slider = Slider::where(function ($query) {
    $query->where('id', '>=', 1)->orWhere('price', '>=', 3000);
//  $query->where('id', '>=', 2)->Where('active', '=', 1);
})->get();


//------------------------------------------------------  insert

$slider = new Slider([                     // Not Good  :(
   "image" => $request->image,
   "caption" => 'test test',
   "active" => 1,
   "price" => $request->price,
]);
$slider->save();


$slider = new Slider();      // object   ,   هم میش جلوش مستقیم ولیو نوشت   |   یا داینامیک پاس داد به صورت یک ریکوست
$slider->image = $request->image;
$slider->caption = $request->caption;
$slider->active = 1;
$slider->price = 7000;
$slider->save();   // بعد از تموم شدن کار ذخیره می کنیم


 Slider::create([   // needs fillable OR guarded , 1)name input  2)database    هم میش جلوش مستقیم ولیو نوشت |  یا داینامیک پاس داد به صورت یک ریکوست
    "image" => $request->image,
    "caption" => $request->caption,
    "active" => $request->active,
    "price" => $request->price,
]);

// Slider::create($request->all.txt());   // هم نام با دیتابس باش  ,  GOOD ^_^  , no upload file(img,mp4)


//------------------------------------------------------ firstOrCreate , first , find , findOrFail

$slider = Slider::firstOrCreate(['id' => 24], [         // بیا همچین آیدی اگه دیتا بیس وجود نداشت اضافه کن
  "image" => "bag.jpg",
   "caption" => "this is bag",
   "link" => "https://www.bag.com",
    "publish" => 1,
]);

$slider = Slider::findOrFail(4);   // go find id    AND   if not id return erro 404(NOT FOUND)
$slider = Slider::find(16);   // go find id   ,  no need foreach
$slider = Slider::find([1, 5, 8]);   // go find id   ,  no need foreach  , array
$slider = Slider::where("id" , ">=" , 5)->first();   // show first data
return $slider->id;


//------------------------------------------------------  update , delete

$slider = Slider::find(25)->update([
   "image" => "serachTest",
   "caption" => "this is serch 2",
   "link" => "https://www.serch.ir"
]);

$slider = Slider::where("id", "=", 24)->update([
    "image" => "color.jpg",
    "caption" => "this is color",
]);

$slider = Slider::where("id", "=", "25")->delete();
$slider = Slider::find(24)->delete();
$slider = Slider::destroy(26);
$slider = Slider::destroy([16, 15]);    // array

return $slider;


//------------------------------------------------------  softDelete

//     $slider = Slider::destroy([7,8,32]);
        $slider = Slider::onlyTrashed()->get();                                       // just show softDelete
        $slider = Slider::withoutTrashed()->get();                                   // just show Not softDelete
        $slider = Slider::withTrashed()->get();                                     // just show all.txt(softDelete AND other)

//      $slider = Slider::onlyTrashed()->where("id" , "=" , 7)->restore();              // back to database  , بازگشت
//      $slider = Slider::onlyTrashed()->find(8)->restore();                           // back to database   , بازگشت
//      $slider = Slider::onlyTrashed()->where("id" , "=" , 32)->forceDelete();       // delete forever
//      $slider = Slider::onlyTrashed()->find(7)->forceDelete();                     // delete forever
        return view('slider.trash', ['slider' => $slider]);


//------------------------------------------------------  use paginate in laravel-8
 public function index()                        // 1)controller   2)blade table   3)AppServiceProvider
    {
        $slider = Slider::paginate(4);
        return view('slider.index' , compact('slider'));
    }

{{ $slider->links() }}          {{--  table , paginate()  --}}

Paginator::useBootstrap();       // AppServiceProvider ->  for use paginate in laravel-8


//------------------------------------------------------  scope     // 1)Model  2)blade

public function scopeStatus($query, $param)      //scope الزامی اولش  |  camelCase اولی کوچک  دومی بزرگ | parameter  | *Model*
{
     $query->where('status', '=', $param);          // نمایش دیتا ها بر اساس یک شرطا
}

public function scopePaginate($query , $param)
{
    $query->paginate($param);        // صفحه بندی
}

$slider = Slider::Status(0)->get();    // Status()  بدون اسکوپ |  دومی پارامتر  |  where  با کار می کند   |  *Blade*
$slider = Slider::Paginate(2);          // صفحه بندی  |  همراه پارامتر
return $slider;


//------------------------------------------------------  Accessors  (show database = USE get)  وقتی که قرار نمایش داده بشه تغییرات اعمال بشه
//------------   1)Model   2) blade
public function getCaptionAttribute($value)  // getNameAttribute   |   الزامی  get,Attribute  | دومی اسم داده تو دیتابیس کپشن
{
     return strtoupper($value);   // همه حروف بزرگ
//   return 'test' . strtoupper($value);
//   return strtolower($value);
     return ucfirst($value);    // فقط حروف اول بزرگ
}


public function getImageAttribute($value)  // getNameAttribute   |   الزامی  get,Attribute  | دومی اسم داده تو دیتابیس کپشن
{
    return "test-" . ($value);
}

public function getLinkAttribute($value)
{
    return strtoupper($value);
}

public function getStatusAttribute($value)
{
    return 1 * ($value);
}

//-----------   blade
$slider = Slider::all.txt();            // Accessors  |  چگونگی نمایش داده ها تو دیتابیس مثلا همه حروف کوچک یا بزرگ یا اولی بزرگ باش


//------------------------------------------------------ mutator (create database = USE set)  وقتی که داخل دیتابیس قرار بره تغییرات اعمال بشه

public function setCaptionAttribute($value)   // setNameAttribute   |   الزامی  set,Attribute  | دومی اسم داده تو دیتابیس کپشن
{
//   $this->attributes['caption'] = strtolower($value);
//   $this->attributes['caption'] = ucfirst($value);  // فقط حروف اول بزرگ
//   $this->attributes['caption'] = strtoupper($value);
}

public function setStatusAttribute($value)
{
//   $this->attributes['status'] = 2 + $value;     // status + 2
}

//-----------   blade
$slider = Slider::all.txt();            // Accessors  |  چگونگی نمایش داده ها تو دیتابیس مثلا همه حروف کوچک یا بزرگ یا اولی بزرگ باش


//-------------------------------------------------------------------------------  ****  Migration  ****

$table->id();  // BigInteger عدد صحیح بزرگ , unsigned بدون امضا یا علامت  ,  primaryKey کلید اصلی یا طلایی   , autoIncrement افزایش خودکار
$table->string('image', 100)->nullable()->comment('image upload file')->unique();          // no repeat
$table->text('description')->nullable()->comment('this is comment');                      // nullable is Null
$table->boolean('status')->default(0);
$table->rememberToken();                                                               // generate 32 character
$table->uuid('data);                                                                  // character 36 is unique
$table->timestamps();                                                                // created_at , updated_at
$table->softDeletes('deleted_at');                                                  // delete part two


//------------------------ update اضافه کردن
public function up()
{
  Schema::table('posts', function (Blueprint $table) {
     $table->boolean('status')->default(0)->after('description');
  });
}

public function down()
{
   Schema::table('posts', function (Blueprint $table) {
      $table->dropColumn('status');        // if rollback go drop or delete column
    );
}




//-------------------------  change تغییر جدول مثل اضافه کردن به طول جدول یا حالت دیفالت یا نال ایبل    |   rename  تغییر اسم جدول
//-------------------------  package   doctrine/dbal برای اصتفاده از این مورد نصب   -- > composer require doctrine/dbal
public function up()
{
  Schema::table('posts', function (Blueprint $table) {
      $table->string('title', 150)->change();                // change column
      $table->renameColumn('description', 'content');       // rename column   |  1)name database  2)name change
  });
}

public function down()
{
  Schema::table('posts', function (Blueprint $table) {
      $table->string('title', 100)->change();                 // change column back
      $table->renameColumn('content', 'description');        // rename column back
  });
}



//---------------------------------------------------------------------------------------  seeder

public function run()
{
//  Slider::where('id' , ">=" , 1)->truncate();             // delete all.txt database
//  DB::table('sliders')->truncate();                      // delete all.txt database

    $faker = \Faker\Factory::create();                   // create data fake
    for ($i = 0; $i < 5; $i++) {
       Slider::create([
           "image" => $faker->imageUrl,
           "caption" => $faker->jobTitle(),
           "link" => $faker->url(),
           "publish" => $faker->numberBetween(0, 1),    // boolean()
       ]);
    }
}

//---------------------------------------------------------------------------------------  factory

class SliderFactory extends Factory
{
protected $model = Slider::class;

public function definition()
{
   return [
      "image" => $this->faker->imageUrl(),
       "caption" => $this->faker->jobTitle,
       "link" => $this->faker->url,
       "publish" => $this->faker->boolean,
     ];
  }
}

//------------------ seeder

//  Slider::factory()->count(7)->create();         // use controller
//  Slider::factory(3)->create();                 // data fake

//------------------ DatabaseSeeder      php artisan db:seed  به صورت خودکار با دستور رو به رو میسازه برای وقتی که سییدر  نسازیم

//  Slider::where('id' , '>=' , 1)->truncate();             // delete all.txt database  |  start id is 1
//  \DB::table('sliders')->truncate();                      // delete all.txt database  |  start id is 1
//  Slider::factory()->count(10)->create(); //وقتی سییدر نداریم و از طریق این جا و با اسم مادل بسازیم دیتا فیک و تو فراخوانی اسم مادل نمیاریم php artisan db:seed
//  Slider::factory(5)->create();

//------------------ controller     فکتوری قابلیت استفاده در کنترلر دارد بدون ساختن سییدر

public function index()
{
//      Slider::where('id', '>=', 1)->truncate();
//      DB::table('sliders')->truncate();
//      Slider::factory()->count(8)->create();        // factory
//      Slider::factory(10)->create();               // factory
}


//--------------------------------------------------------------------------------------- npm install

// تئضیحات اصلی تو پوشه عکس ها لپ تاب تو پوشه پاورپونت و  قسمت لاراول میکس
// npm install bootstrap@4.6.0     |     npm install jquery        |      npm init  پکیج جیسون
// npm install popper              |     npm i font-awesome@4.7.0

//---------------------------------------------------------------------------------------  about Webpack (npm install & npm dev)

1)  npm install (node_modules)     // نصب نود ماژول
2)  npm run dev (development)     // resources/js/app.js & resources/css/app.css  نصب این پوشه ها در  |  public -> js -> app..js تمام کد ها تبدیل به جاوااسکریپت
5)  npm run prod   **اختیاری**  (production   // /js/app.js.LICEVSE.txt کد که درست کرده که فایل (اپ جی اس) مینی فای میکنه  یا حجم کمتر میکنه   |  یک فایل جدید میسازه

//-------------------------------------------------- laravel ui     &&    webpack.mix.js
mix.js('resources/js/app.js', 'public/js').styles([
    "public/css/slider.css",       // دستی ساختیم  | اجباری نیست همه یکی کنیم هرکدوم که بخواهیم
    'public/css/about.css',
    'public/css/parallax.css',
], 'public/css/all.txt.css').js([
    "public/js/alert.js",
    "public/js/phone.js",
], 'public/js/test.js');     // همه فایل هایcss, js   که ساختیم بریز درون all.txt.css, test.js یا هر اسمی و یکی کن کامل  |  به ترتبب اضافه میکنه

4)  npm run dev (development)                                 //    برای هر آپدیت تو (وب پکیج) میایم این کد دستوری میزنیم هر تغییراتی
5)  npm run prod   **اختیاری**  (production)                   // حجم فایل ها کم میکنه حالت  min.css   **اختیاری**
6)  npm run watch   **اختیاری**                              // all.txt.css تغییرات جدید کد ها آنلاین اضافه میکنه هر وقت کدی بزنی درون


//--------------------------------------------------------------------------------------- laravel ui

1)  *composer require laravel/ui                                                  // ui نصب لاراول
2)  *php artisan ui bootstrap                                                    // install bootstrap in project
3)  *Please run   "npm install"   to compile your fresh scaffolding.            //  نصب نودماژول پگیج هایی اضافه کنه به دوره
4)  *npm install --save-dev webpack-cli                                       //  npm run dev میزنی  |  بعدش npm install  این مرحله بعد از
5)  *Please run   " npm run dev"   to compile your fresh scaffolding.     // public app.css, app.js اضافه شد bootstrap آپدیت اضافه کردن پکیج های جدید به پروژه
6)  *npm run prod  **اختیاری**                                             // public  app.css,app.js  |  app.min.css مرحله اختباری برای کم کردن حجم فایل ها مثل

//----------------------------------------------------------------------------------------------------------------------

//*********************************************************************************************************************
                           FINISH  --------------- >  AND START  Relationship Laravel-8
//*********************************************************************************************************************

//----------------------------------------------------------*********************   One To One    *********************
 //------------------ DatabaseSeeder
\App\Models\User::factory(3)->create();

//-------------------- factory Image
  return [
      "image" => $this->faker->image,
      "foreign_key" => $this->faker->numberBetween(1, 3),
        ];

//-------------------- seeder Image
Image::factory(3)->create();

//-------------------- migration
Schema::create('images', function (Blueprint $table) {   // table get foreign key (slave برده)
   $table->id();
   $table->string('image' , 150);
   $table->unsignedBigInteger('foreign_key');
   $table->foreign('foreign_key')->on('users')->references('id')->onDelete('cascade');//1)foreign key 2)table 3)column 4)delete too
   $table->timestamps();
        });


//----------------------------Mddel Image
class Image extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  public function user() // 1)model name     2)foreing key    3)column unique(references) مالک کلید خارجی
  {
     return $this->belongsTo(User::class , 'foreign_key' , 'id'); // متعلق به یک ستون از جدول یوزرز
  }
}

public function image()   // 1)model name     2)foreing key
{
    return $this->hasOne(Image::class, 'foreign_key');  // دارد یک ستون درون جدول images
}

//------------------------- controller
public function index()
{
//  $image = Image::findOrFail(2)->user;
//  return $image;

//    $image = User::all.txt();
//    $image = User::findOrFail(2)->image;
//    $image = User::findOrFail(2)->image()->where('id', '=', 2)->get();
//    return $image;

      $users = User::with('image')->get();    // with (relations) روابط هر چند تا باش
      return view('image.index' , ['users' => $users]);


//---------------------------------------------------------------------  setting
PHP -> Laravel    *هر دو گزینه فعال کنید
enable plugin for this project                                              // افزونه را برای این پروژه فعال کنید
use auto Popup for completion (use at own risk together with symfony 2)    // برای تکمیل از پنجره خودکار استفاده کنید (با خطر شخصی همراه با سیمفونی 2 استفاده کنید)



//----------------------------------------------------------*********************   One To Many    *********************

//------------------- factory
return [
    "title" => $this->faker->jobTitle(),
    "image" => $this->faker->imageUrl(),
    "description" => $this->faker->text,
    "active" => $this->faker->numberBetween(0, 1),
];

//------------------- seeder
public function run()
{
    Post::factory()->count(3)->create();
}

//------------------- Model Post
protected $guarded = ['id'];
//  protected $fillable = ['title' , 'image' , 'description' , 'active'];

//-------------------------------------------- migration Post (master)
همه چی عادی نوشته شده چوم جدول مستر یا استاد



// --------------------------------------------- part 2



//------------------- factory
return [
    "fullName" => $this->faker->userName(),
    "email" => $this->faker->email(),
    "comment" => $this->faker->title,
    "foreign_key" => $this->faker->numberBetween(1, 3),
];

//------------------- seeder
public function run()
{
    Comment::factory()->count(10)->create();
}

//------------------- Model Comment
protected $guarded = ['id'];
//  protected  $fillable = ['fullName' , 'email' , 'comment' , 'foreign_key'];

//-------------------------------------------- migration Comment (slave)
$table->id();
$table->string('fullName');
$table->string('email');
$table->string('comment' , 1000);
$table->unsignedBigInteger('foreign_key');
$table->foreign('foreign_key')->on('posts')->references('id')->onDelete('cascade'); //1)foreign key 2)table 3)column 4)delete too
$table->timestamps();


//----------------- Model Post
public function comments()
{
    return $this->hasMany(Comment::class, 'post_id');   // جدول مستر یا استاد که دارد تعداد زیادی جدول زیر مجموعه کامنت
}

//------------------ Model Comment
public function post()
{
    return $this->belongsTo(Post::class , 'post_id' , 'id');  // جدول برده و متعلق به جدول پست
}

//----------------- controller
$post = Post::findOrFail(3)->comments;
$post = Post::findOrFail(3)->comments()->where('id', '>=', 5)->get();

$comment = Comment::findOrFail(4)->post;
$comment = Comment::findOrFail(3)->post()->where('id', '=', 2)->get();

// return $comment;




//////////////////// PART 2


//-------------------------- controller index
$post = Post::with('comments')->get();    // all.txt post && all.txt comment
return view('post.index', compact("post"));


//--------------------------------------------------  show index table post and comments
<table class="table table-bordered table-hover table-responsive-lg bg-dark">

<tr class="text-center text-warning font-weight-bold">
    <td>id</td>
    <td>title</td>
    <td>image</td>
    <td>fullname</td>
    <td>email</td>
</tr>

      @forelse ($post as $item)

          @forelse ($item->comments as $comment)
             <tr class="text-center text-white">
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->image }}</td>
                  <td>{{ $comment->fullname }}</td>
                  <td>{{ $comment->email }}</td>
              </tr>
          @empty
              {{"no data"}}
           @endforelse

           @empty
              <tr>
                  <td colspan="4">no data</td>
              </tr>
           @endforelse

</table>


//---------------------------------------- index , create , store , edit  , update  , delete  (CRUD ONE TO MANY)


public function index()
{
    $comment = Comment::with('post')->get();
    return view('comment.index', ['comment' => $comment]);
}

//------------------------------

public function create()
{
    $post = Post::pluck('title', 'id');// برای برگردوندن دو تا مقدار      اولی ستون دلخواه       دومی آیدی منحصر به فرد
    return view("comment.create", ['post' => $post]);
    return $post;

    /*$data = [];
    foreach ($post as $item) {
        array_push($data , ['id' => $item->id , 'title' => $item->title]);   //1) درون یک متغیر ارایه خالی    2) مقادیری که میریزیم توی یک آرایه
    }
    return  $data;* /
}


//------------------------------


public function store(Request $request)
{
    Comment::create([                      // 1)database    2)name input
        "fullname" => $request->fullname,
        "email" => $request->email,
        "comment" => $request->comment,
        "post_id" => $request->posts,
    ]);
    session()->flash('create', 'عملیات ساخت دیتا با موفقیت انجام شد');
    return redirect()->route('comment.create');
//     return redirect('comment/create');
//     return back();
}



//------------------------------


public function edit($comment)
{
    $commentData = Comment::findOrFail($comment);                  // $commentData   یکی نباش اسم ها تا به خطا نخوره
    $post = Comment::findOrFail($comment)->post;                  // id table post
    return view("comment.edit", compact(["commentData", "post"]));
//  dd($comment);
//  $commentData = Comment::findOrFail($comment);
//  $post = Comment::findOrFail($comment)->post;
//  return view("comment.edit", compact(["commentData", "post"]));
}


//------------------------------


public function update(Request $request, $comment)
{
    $commentData = Comment::findOrFail($comment);
    $commentData->update([
        "fullname" => $request->fullname,
        "email" => $request->email,
        "comment" => $request->comment,
        "post_id" => $request->posts,
    ]);
    session()->flash('update' , 'عملیات به روز رسانی با موفقیت انجام شد');
    return redirect()->route('comment.index');
//      return redirect('comment');
}


//------------------------------


public function destroy($comment)
{

/*$post = Post::findOrFail($post);       // وقتی که کامنت یا محصولات ما عکس های زیادی داشته باشد و بخواهیم همه پاک نیم وقتی پست پاک بشه
foreach ($post as $item) {
    $image = $item->comments->image;
}
if (file_exists("images/comments/" . $image)) {
    unlink("images/comments/" . $image);
}* /


    Comment::destroy($comment);
    session()->flash('delete', 'عملیات حذف با موفقیت انجام شد');
    return redirect()->route('comment.index');
//      return redirect('comment');
//      return  back();
}







//----------------------------------------------------------*********************   Many To Many    *********************

//---------------------------  Seeder User (DatabaseSeeder)
User::factory()->count(3)->create();   // وقتی که سییدر نداریم و میش از طریق این جا و با اسم مادل بسازیم دیتا فیک و تو فراخوانی اسم مادل نمیاریم php artisan db:seed



//--------------------------- migration
Schema::create('role_user', function (Blueprint $table) {  // related table roles AND users  (Many To Many)
    $table->id();
    $table->unsignedBigInteger('role_id');
    $table->foreign('role_id')->on('roles')->references('id');  // ->onDelete('cascade')
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->on('users')->references('id');   // ->onDelete('cascade')
    $table->timestamps();
});



//--------------------------- Model User
public function roles()   // Many To Many
{
    return $this->belongsToMany(Role::class);   // متعلق به تعداد زیادی از جدول رولز
}


//--------------------------- Model Role
protected $guarded = ['id'];

public function users()    // Many To Many
{
    return $this->belongsToMany(User::class);    // متعلق به تعداد زیادی از جدول یوزرز
}

//--------------------------- Controller role
public function index()
{
//  return Role::findOrFail(3)->users;
//  return Role::findOrFail(2)->users()->where('user_id' , '=' , 1)->get();

//  return User::findOrFail(1)->roles;
//  return User::findOrFail(3)->roles()->where('role_id' , '=' , 3)->get();
//  return  User::with('roles')->get();
//  return Role::with('users')->get();

    $users = User::with('roles')->get();           // all.txt table users && roles
    return view('roles.index', compact("users"));
}

//--------------------------- show role

   <tr class="text-warning font-weight-bold">
       <td>name</td>
        <td>email</td>
        <td>name_role</td>
   </tr>

   @forelse ($users as $item)
       <tr class="text-white">
           <td>{{ $item->name }}</td>
           <td>{{ $item->email }}</td>

          <td>
   @forelse ($item->roles as $role)
            {{ $role->name_role }}

             @empty
             @endforelse
          </td>
      </tr>
             @empty
     <tr>
              <td colspan="3">no data(empty)</td>
     </tr>
   @endforelse


//--------------------------------------------------  CRUD   Many To Many

//  $roles = Role::where('id' , '>=' , 1)->get();
$roles = Role::all.txt();

//  User::findOrFail(2)->roles()->attach([2,3]);     // insert --> reza (writer+editor)   بیا یوزر دوم اضافه کن نقش های نویسنده و ویرایشگر
//  User::findOrFail(2)->roles()->detach([2,3]);   // delete --> reza (writer)   بیا یوزر دوم حذف کن نقش نویسنده
//  User::findOrFail(1)->roles()->sync([1,2,3]); // insert delete update --> هر عددی که درونش باش نگه میداره بقیه حذف میکنه مثلا اگه یک و دو درونش باش خودکار سه حذف
User::findOrFail(2)->roles()->sync($roles);         // all.txt roles insert


/*foreach ($roles as $item) {
    echo $item->name_role . "<br/>";     // collection
}



//----------------------------------------------------  Model با قوانین خودمون بنویسیم ماگرشن  و مادل

//-------------------------------------------- migration

Schema::create('role_user', function (Blueprint $table) {  // related table roles AND users  (Many To Many)
    $table->id();
    $table->unsignedBigInteger('foreign_role');
    $table->foreign('foreign_role')->on('roles')->references('id');  // ->onDelete('cascade')
    $table->unsignedBigInteger('foreign_user');
    $table->foreign('foreign_user')->on('users')->references('id');   // ->onDelete('cascade')
    $table->timestamps();
});


//--------------------------------------------- Model 1) Role     2) User

/*  public function users()    // Many To Many
  {
      return $this->belongsToMany(User::class);    // متعلق به تعداد زیادی از جدول یوزرز
  }* /

public function users()  // 1) name Model    2) name table     3) هم نام مادل اصلی foreignKey self    4) ارتباطش با کلید خارجی foreignKey second
{
    return $this->belongsToMany(User::class , "role_user" , "foreign_role" , "foreign_user");
}



/*  public function roles()   // Many To Many
   {
       return $this->belongsToMany(Role::class);   // متعلق به تعداد زیادی از جدول رولز
   }* /

public function roles()  // 1) name Model    2) name table     3) هم نام مادل اصلی foreignKey self    4) ارتباطش با کلید خارجی foreignKey second
{
    return $this->belongsToMany(Role::class , "role_user" , "foreign_user" , "foreign_role");
}





//-------------------*********************    has many through  کلی مقدار از میان یا رابط یا دلال مثل پست بین کانتری و کامنت   *********************

//------------------------------  Migration Country    ترتبیت جداول مهم
$table->string('country' , 100);


//------------------------------ Migration Post
$table->string('title' , 100);
$table->string('image' , 100);
$table->text('description');
$table->unsignedBigInteger("country_id");
$table->foreign("country_id")->on("countries")->references('id')->onDelete('cascade');  // یک کشور پاک شع کل پستا پاک میشه


//------------------------------ Migration Comment
$table->string("fillName" , 100);
$table->string("email" , 100);
$table->string('comment' , 500);
$table->unsignedBigInteger("post_id");
$table->foreign("post_id")->on("posts")->references("id")->onDelete("cascade");// پست پاک شع کامنتم پاک میشه


//------------------------------ factory Post   من فقط یکی نوشتم
return [
   "title" => $this->faker->jobTitle,
   "image" => $this->faker->imageUrl,
   "description" => $this->faker->text,
   "country_id" => $this->faker->numberBetween(1,3),  // برای کشور ها 3 تا میسازه
];



//------------------------------ Seeder Post
Post::factory(3)->create();



//------------------------------  Model Comment   رابطه بین کشور ها  و کامنت ها  (میانه یا رتبطه بین یا دلال از پست استفاده و برای همین از هز منی تورو استفاده می کنیم )

protected $guarded = ['id'];
//  protected $fillable = ['country'];


public function comments()
{
    return $this->hasManyThrough(Comment::class, Post::class);  // 1)related  ارتباط با کیه    B2)through میانه یا وسط یا دلال
    // return $this->hasManyThrough(Comment::class , Post::class , "foreign_country" , "foreign_post");
    // 1)related  ارتباط با کیه    B2)through میانه یا وسط یا دلال        C3)foreign country     D4)foreign Post   |  حالتی که طبق قانون لاراول نریم جلو
}







//--------------------------------*********************   One To One Polymorph    *********************

//------------------------------------ migration image
Schema::create('images', function (Blueprint $table) {
    $table->id();
    $table->string("image_name");
    $table->morphs("imageable");   // name Model + able --> imageable  |  imageable_type(nameModel)  |  imageable_id(id)
    $table->timestamps();
});


//------------------------------------ Model image
public function imageable()  // name foreign Key   |  table slave
{
    return $this->morphTo(Image::class);   // من وابسته ام به
}


//------------------------------------ Model Other بقیه همین شکل
public function image()     // table master
{
    return $this->morphOne(Image::class , "imageable");   // name Model(image)   2) name foreignKey(image)
}


//------------------------------------- PostController
public function index()
{
//      return Post::with('image')->get();
//      return Slider::findOrFail(1)->image;
//      return product::findOrFail(2)->image;
//      return Post::findOrFail(2)->image;
//      return Post::findOrFail(1);
}

//----------------------------------------------------------------------  change name model && migration
//---------------------------- migration
Schema::create('images', function (Blueprint $table) {
    $table->id();
    $table->string("image_name");
    $table->morphs("image_poly");
//  $table->morphs("imageable");   // name Model + able --> imageable  |  imageable_type(nameModel)  |  imageable_id(id)
    $table->timestamps();
});

//---------------------------- model Image
public function image_poly()  // change name  |  table slave  |  imagePoly  OR  image_poly حالت اسم درون ماگرشن یا حروف بزرگ
{
    return $this->morphTo();   // من وابسته ام به
}

//---------------------------- model other بقیه همین شکل
public function image()     // table master
{
    return $this->morphOne(Image::class , "image_poly");   // name Model(image)   2) name foreignKey(image)
}

//----------------------------- controller
public function index()
{
//  return Post::findOrFail(1)->image;        // name model
    return Image::findOrFail(1)->image_poly; // name model   |   imagePoly  OR  image_poly حالت اسم درون ماگرشن یا حروف بزرگ
}


//=================================================  create in (One To One Polymorph)

// $latestSlider = Slider::orderBy('id' , 'desc')->take(1)->skip(0)->get();     // take بگیر   skip رد شدن یا پریدن
// $latestProduct = Slider::orderBy("id", "desc")->first();                    // last id in table  (آیدی آخر بر میگردونه)
$latestSlider = OrderByPost::OrderById("id", "desc");                         // service
Slider::findOrFail(3)->image()->create([
    "image_name" => "imgSlider.jpg",
]);


//------------------------------ product Controller
// ProductService::CreateProImage();                    // create image
// ProductService::CreatePro();                       // create product  |  Service


//------------------------------ Service
public static function CreatePro()
{
    product::create([
        "title" => "MobileA30",
        "price" => '3.5',
        "body" => "good best mobile",
    ]);
}


public static function CreateProImage()
{
    return product::findOrFail(1)->image()->create([
        "image_name" => "pictureA70",
    ]);
}


//==================================================================== Create Service && Helper
//---------------------------- controller
public
function store(Request $request): RedirectResponse
{
    $image = ImageCreateHelper::getUploadImage($request, "product");
    ProductService::getCreateProduct($request);
    $latestProduct = ProductService::getOrderById("id", "desc");
    ProductService::getCreateProductImage($latestProduct, $image);

    SessionHelper::getSessionCreate();
    return redirect()->route('product.create');
//      return redirect('product/create');
//      return back();
}

//---------------------------- Service
class ProductService
{

    public static function getCreateProduct($request)
    {
        Product::create([
            "title" => $request->title,
            "price" => $request->price,
            "body" => $request->body,
        ]);

    }


    public static function getOrderById($id, $type)
    {
        return Product::orderBy($id, $type)->first();
    }

    public static function getCreateProductImage($latestProduct, $image)
    {
        Product::findOrFail($latestProduct->id)->image()->create([
            "image_name" => $image,
        ]);
    }


}

//---------------------------- image Helper

class ImageCreateHelper
{


    public static function getUploadImage($request, $directory): string
    {
        $file = $request->file('image');
        $image = "";
        if (!empty($file)) {
            $image = $directory . "_" . time() . "_" . rand(100_000, 999_999) . "_" . $file->getClientOriginalName();
            $file->move("images/$directory/", $image);
        }
        return $image;   // type  : string
    }

}

//---------------------------- session Helper

class SessionHelper
{

    public static function getSessionCreate()
    {
        session()->flash('create', 'عملیات ساخت دیتا با موفقیت انجام شد');
    }

    public static function getSessionUpdate()
    {
        session()->flash('update', 'عملیات به روز رسانی دیتا با موفقیت انجام شد');
    }

    public static function getSessionDelete()
    {
        session()->flash('delete', 'عملیات حذف دیتا با موفقیت انجام شد');
    }


}

//--------------------------------*********************   One To Many Polymorph    *********************

//--------------------------------Model slave   |  seeder factore no type ننوشتم
public function commentable()
{
    return $this->morphTo();  // متعلق به جدول های مستر
}


//--------------------------------Model master بقیه همین شکل
public function comments()
{
    return $this->morphMany(Comment::class , "commentable");  // table master
}


//-------------------------------- migration  ن بقیه ننوشتم
$table->string('fullname', 150);
$table->string('email', 150);
$table->morphs('commentable');      //  commentable لاراولی   OR   comment_poly



//-------------------------------- Controller index
//--------------- create
//  return Post::all.txt();
return Post::findOrFail(1)->comments()->create([
  "fullname" => "turajArmin",
      "email" => "turaj@gmail.com",
   ]);

//--------------- show
//   return Post::findOrFail(1)->comments()->where('commentable_type', '=', "App\Models\Post")->get();
//    return Post::findOrFail(1)->comments;
//   return Post::with('comments')->get();

//--------------- update
return Post::findOrFail(1)->comments()->where('commentable_type', '=', "App\Models\Post")->where('commentable_id', '=', 1)->update([
    "email" => "hello@gmail.com",
]);

return Post::findOrFail(1)->comments()->where('commentable_type', '=', 'App\Models\Post')->
where("commentable_id", "=", 1)->where('id', '=', 5)->update([
    "fullname" => "elecode",
    "email" => "hello@gmail.com",
]);

//---------------  delete
// return Post::findOrFail(1)->comments()->where('commentable_type', '=', "App\Models\Post")->where('commentable_id', '=', 1)->delete();






//--------------------------------*********************   Many To Many Polymorph    *********************

//---------------------- migration
Schema::create('taggables', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('tag_id');        // فقط فقط لازم اونی که رابطه چند تایی داره بنویسیم
    $table->foreign('tag_id')->on('tags')->references('id')->onDelete('cascade');// اگر پست و محصولات پاک شن این تگ پاک میشه
    $table->morphs('taggable');                 // چون تگ خودش به بقیه به وسیله مورف وصل
    $table->timestamps();
});

//---------------------- Model tag>
public function products()
{
    return $this->morphedByMany(Product::class , 'taggable');  // با کلی جدول در اترباط   many to many() polymorph
}

//---------------------- Model Post (other بقیه همین شکل)
public function tags()
{
    return $this->morphToMany(Tag::class , "taggable");      // many to many (polymorph)
}

//---------------------- PostController
//  return Post::findOrFail(1);
//  return Post::findOrFail(1)->tags()->attach([1, 2, 3, 4]);  //sync([1, 2, 3, 4])
//  return Post::findOrFail(1)->tags()->detach([4]);
//  return Post::findOrFail(1)->tags()->sync([1,2]);

//  $tags = Tag::where("id", ">=", 2)->get();
//  $tags = Tag::all.txt();
//  return Post::findOrFail(2)->tags()->sync($tags);
//  return Post::with('tags')->get();


// return Tag::findOrFail(1)->posts;
// return Tag::findOrFail(1)->posts()->where('taggable_type' , '=' , 'App\Models\Post')->get();
// return Tag::findOrFail(1)->posts()->where('taggable_type', '=', 'App\Models\Post')->where("taggable_id", '=', 1)->where('tag_id', '=', 1)->get();
   return Tag::findOrFail(1)->posts()->where('taggable_type', '=', 'App\Models\Post')->where("taggable_id", '=', 1)->where('tag_id', '=', 1)->get();






//***********************************************************************************************************************
                            ///////////////           Start Session & Middleware (auth)            ///////////////
//***********************************************************************************************************************

//---------------------------------------- session
public function index()
{
    / * session()->put([                    // insert session
         "firstName" => 'mahdi',
         'lastName' => 'shm',
         'fatherName' => 'noroallah',
     ]);* /

    session()->flash('create' , "عملیات بارگذاری دیتا در دیتابیس با موفقیت انجام شد");
}


public function create()
{
//  return session()->all();                 // all show session
//  return session()->get('firstName');
//  return session('firstName');

//  session()->forget("firstName");         // go one delete
//  return session('firstName');
//  return session()->exists('firstName');

//  session()->flush();                   // delete all
//  return session()->all();

    return session('create')
}



/////////////////////////////////////////////////////  Middleware  /////////////////////////////////////////////////////

//-------------------------------------- VerifyCsrfToken     csrf(419  PAGE EXPIRED)

class   **** VerifyCsrfToken ****   extends Middleware
* The URIs that should be excluded from CSRF verification.
* the all route must middleware  csrf(419  PAGE EXPIRED)  , $except مگر این مسیر هایی که درون من آزاد


//-------------------------------------- PreventRequestsDuringMaintenance    down (503 SERVICE UNAVAILABLE)

class   **** PreventRequestsDuringMaintenance ****   extends Middleware
* The URIs that should be reachable while maintenance mode is enabled.
* the all route must middleware down   (503 SERVICE UNAVAILABLE)   ,   $except مگر این مسیر هایی که درون من آزاد
* php artisan down       (503 SERVICE UNAVAILABLE) Application is now in maintenance mode.  ,   تمام مسیر ها میبنده   |  برای تغییرات توی سایت
* php artisan up          Application is now live.    آزاد میکنه  free


//-------------------------------------- $middleware  روی تمام مسیر ها و کل سایت اجرا میشه

* The application's global HTTP middleware stack.
* THE ALL ROUTE MIDDLEWARE  روی تمام مسیر ها اجرا میشه
protected $middleware = [ ]


//-------------------------------------- $middlewareGroups    api & web دو مدل داریم

* The application's route middleware groups.
* api & web     دو مدل داریم
protected $middlewareGroups = [ ]

//-------------------------------------- $routeMiddleware   به صورت دسستی تو مسیر هایی که بخوام
* The application's route middleware.
* handle route middleware   به صورت دسستی تو مسیر هایی که بخوام
* These middleware may be assigned to groups or used individually.
protected $routeMiddleware = [
  'check' => \App\Http\Middleware\checkParam::class,   // handle به صورت دسستی تو مسیر هایی که بخوام
]

class checkParam                       // خودمون ساختیم
{
    public function handle(Request $request, Closure $next)
    {
        echo "hello word";
        return $next($request);   // $nex  اجازه میده رد بشه
    }
}



//--------------------------------------------------------------  route
Route::resource("/post", \App\Http\Controllers\PostController::class)->parameters(['post' => 'id'])->middleware('isAdmin');


//----------------------------- controller این جا میشه تعریف کرد به جای درون مسیر ها یا روت
public function __construct()
{
    $this->middleware('check');     // به جای تعریف درون روت ها یا مسیر ها
}

//------------------------------------------------------------- middleware parameter
class checkParam
{
    public function handle(Request $request, Closure $next, $param1, $param2)
    {
//      if ($request->username==="admin) {                                       // $request = http  |  has or exists اگر وجود داشت
//      if ($request->has('username')) {                                        // $request = http  |  has or exists اگر وجود داشت
        if ($param1 === "admin" || $param2 === "manager") {                   // $request->username = http  درخواست چک کردن
            return $next($request);                                         // $next($request)   اجازه میده رد بشه
        } else {
            abort('404');                                                // show eror
        }
    }
}

//---------------------- route
Route::resource("/slider", \App\Http\Controllers\SliderController::class)->parameters(['slider' => 'id'])->middleware('check:admin,manager');

//----------------------- controller
public function __construct()
{
     $this->middleware('check:admin,manager');     // به جای تعریف درون روت ها یا مسیر ها  |  پارامتر check : admin,manager میدلور
}



//------------------------------------------------------------- error 4040,500,5033
1) create blade -> 404.blade.php   دقیقا اسم خطا
2) create blade -> 500.blade.php   دقیقا اسم خطا


//------------------------------------------------------------- forget password (email send)
SMTP           // https://mailtrap.io/   آدرس وب سایت
Host:smtp.mailtrap.io
Port:25 or 465 or 587 or 2525
Username:80c9f2cfb571c3
Password:64192e8844dbf7
Auth:PLAIN, LOGIN and CRAM-MD5
TLS:Optional (STARTTLS on all ports)


MAIL_MAILER=smtp
*MAIL_HOST=smtp.mailtrap.io
*MAIL_PORT=2525
*MAIL_USERNAME=80c9f2cfb571c3
*MAIL_PASSWORD=64192e8844dbf7
MAIL_ENCRYPTION=null
*MAIL_FROM_ADDRESS=elecodeiranzamin@info.com  # address domain
MAIL_FROM_NAME="${APP_NAME}"

// اگر زدی کار نکرد این خط کد درون ترمینال میزنیم   composer dumpautoload




//------------------------------------------------------------- email verify (تاییده ایمیل)

1) Auth::routes(['verify' => true]);      // تمام روت ها یا مسیر هایی که برای آتنتیکیشن   |   email verify actice
2) Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');  // اضافه کردن میدلور ایمیل وری فای


3) use Illuminate\Contracts\Auth\MustVerifyEmail;   // فعال کنیم با کدی که اضافه می کنیم بعد مادل
class User extends Authenticatable implements MustVerifyEmail    // با اضافه کردن این خط کد می توانیم دسترسی داشته باشیم implements MustVerifyEmail




//------------------------------------------------------------- email verify (تاییده ایمیل)  تعریف میدلور درون کنترلر و فعال کردن ایمیل وری فای


publicfunction __construct()
{
    $this->middleware(['auth', 'verified']);                 // این میلدور تو این صفحه هست حتما باید لاگین کنی   |  به روت اضافه کرد
}

if ($options['verify'] ?? false) {                         // if ($options['verify'] ?? true)     که دیگه درون روتز تعریف نکنیم
    $this->emailVerification();
}                                                          // vendor -> laravel -> ui -> src -> AuthRouteMethods.php


//------------------------------------------------------------- auth  احراز هویت

Route::get('/slider', function () {

//  dd(\Illuminate\Support\Facades\Auth::user());
//  return \Illuminate\Support\Facades\Auth::user()->password;

//  return \Illuminate\Support\Facades\Auth::id();
//  dd(\Illuminate\Support\Facades\Auth::check());     // User is logged in

    if (\Illuminate\Support\Facades\Auth::check() === true) {
        return "<h1>Welcome to us website ".\Illuminate\Support\Facades\Auth::user()->name."</h1>";
    } else {
        return "<h1><a href='".\route('register')."'>register</a>کاربر گرامی لطفا ابتدا ثبت نام کنید </h1>";
    }

//  Auth::logout();          // exist
//  return redirect('/');
//  return redirect()->route('laravel');

    $user = \App\Models\User::findOrFail(2);          //  route hiden for login
    Auth::login($user);
    return redirect('/home');

});

//========================================================================================== auth  download
@auth
     <a href="{{ asset('images/wallpaper/desktop-1.jpg') }}" download="download" class="btn btn-primary text-capitalize mr-5">download</a>
     <img src="{{ asset('images/wallpaper/desktop-1.jpg') }}" alt="image" width="250" height="250">
@else

     <a href="{{ route('register') }}" class="btn btn-warning text-dark text-capitalize">register to website</a>
@endauth



@guest()
     <a href="{{ route('register') }}" class="btn btn-danger text-light text-capitalize">go to register</a>
@else

<a href="{{ asset('images/wallpaper/login-1.jpg') }}" download="download" class="btn btn-info text-light text-capitalize mr-5">download</a>
     <img src="{{ asset('images/wallpaper/login-1.jpg') }}" alt="image" width="250" height="250">
@endguest




//========================================================================================== access سطح دسترسی  filter فیلتر کردن


//--------------------- migration
$table->string('title');
$table->string('image');
$table->text('descrription');
$table->unsignedBigInteger('user_id');
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


//--------------------- model post
public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');  // هر پست متعلق به کلی یوزر
}


//--------------------- model user
public function posts()
{
    return $this->hasMany(Post::class, 'user_id');  // تعداد زیادی دارد پست هر یوزر
}
//--------------------- postController

//  $post = Post::all();
//  $post = Post::with('user')->get();
    $user = Auth::user();
    $post = Post::where('user_id' , '=' , $user->id)->get();        // فیلتر کردن = فقط پست های مربوط به آیدی مهدی
    return view('post.index' , compact('post'));



//--------------------- blade

@forelse ($post as $item)
   <tr class="text-white">
         <td>{{ $item->title }}</td>
          <td>{{ \Illuminate\Support\Str::limit($item->image , 20) }}</td>
          <td>{{ \Illuminate\Support\Str::limit($item->description , 30) }}</td>
          <td>{{ $item->user->name }}</td>
          <td><a href="" class="btn btn-info text-light text-capitalize">update</a></td>
          <td><a href="" class="btn btn-danger text-light text-capitalize">delete</a></td>
   </tr>
@empty
   <tr>
        <td colspan="6">no data</td>
   </tr>
@endforelse


//=========================================================================================  access  Gate::allow   *********************

//-------------------------  AuthServiceProvider
public function boot()
{
    $this->registerPolicies();

    Gate::define('update-post', function (User $user ,Post $post) { // شخضی که پستی نوشته فقط پست خودش تغییر بده  |  1) اسم گیت  2) متغیر ها لازم برای شرط
        return $user->id === $post->user_id;   // id user === user_id رابطه وان تو منی
    });
}



//-------------------------  controller index
$user = Auth::user();
$post = Post::with('user')->get();
return view('post.index', compact('post'));



//------------------------- controller edit
//      $post = Post::findOrFail($id);
$user = Auth::user();                      // all table users  |  لازم نیست یوزر درون گیت بنویسیم چون خودش فراخوانی میکنه
$post = Post::findOrFail($id);

if ($user->can('update-post', $post)) {                 // can می تواند  |   can === allows شبیه هم
    return view('post.edit', compact('post'));
} else {
    return abort('403');  // forbidden  ممنوع
}

/*if (Gate::denies('update-post', $post)) {                 // denies   تکذیب می کند   |  برعکس allows
    return abort('403');  // forbidden  ممنوع
}else {
    return view('post.edit' , compact('post'));
}/


/*if (Gate::allows('update-post', $post)) {
    return view('post.edit' , compact('post'));
}else {
    return abort('403');  // forbidden  ممنوع
} /



//------------------------- controller delete
$user = Auth::user();
$postData = Post::findOrFail($id);
if ($user->can('update-post' , $postData)) {
    Post::destroy($postData->id);   // ایدی پست های سایت
    return redirect()->route('post.index');
//          return redirect('post');
//          return back();

}else{
    return abort('403');
}

//------------------------- balde (not collective)
<td><a href="{{ route('post.edit' , ['id' => $item->id]) }}" class="btn btn-info text-light text-capitalize">update</a></td>

<td>
    <form action="{{ route('post.destroy' , ['id' => $item->id]) }}" method="post">
        @csrf
        @method('delete')
         <input type="submit" value="delete" class="btn btn-danger text-capitalize">
    </form>
</td>



//------------------------------------------------------------------- access  Policy

//----------------------- create policy in AuthServiceProvider
protected $policies = [
    // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    Post::class => PostPolicy::class,     // معرفی کردن به AuthServiceProvider
];


//----------------------- create policy

public function view(User $user, Post $post)      // کاربری که لاگین کرده بیاد پست های خودش ببینه
{
    return $user->id === $post->user_id;         // if id user === id post(user_id) One To Many
}


public function update(User $user, Post $post)
{
    return $user->id === $post->user_id;
}


public function delete(User $user, Post $post)
{
    return $user->id === $post->user_id;
}

//----------------------- controller
//      $post = Post::findOrFail($id);
$user = Auth::user();                    // all table users  |  لازم نیست یوزر درون گیت بنویسیم چون خودش فراخوانی میکنه
$post = Post::findOrFail($id);
return view('post.edit', ['post' => $post]);
if ($this->authorize('update', $post)) {
    return view('post.edit', compact('post'));

} else {
    abort('403');
}


$user = Auth::user();                      // all table users  |  لازم نیست یوزر درون گیت بنویسیم چون خودش فراخوانی میکنه
$postData = Post::findOrFail($id);
if ($user->can('delete', $postData)) {
    Post::destroy($postData->id);
    return redirect()->route('post.index');
//          return redirect('post');
//          return back();
} else {
    return abort('403');
}

//----------------------- blade @can

@can('update' , $post)       {{--  1) name authorize  2) arguments   --}}
    <h1 class="bg-secondary text-warning text-center p-4">This Page Is Edit For User {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>

@else
    <h1>شما به این صفحه دسترسی ندارید</h1>
@endcan




//==========================================================================================   Api Json   *********************

let data = {
   firstName: "mahdi",
   lastName: "shm",
   age: 34,
   email: "t@t.com",
   accept: true,
   employee: {
   fullname: "mahdiShm",
   address: "tehran-teh",
   },
   degree: [96, 1400],
}

let result = JSON.stringify(data);                      // object  -->  Json
console.log(result)

let changeData = JSON.parse(result);                  // Json  -->  Object
console.log(changeData.degree[1])
console.log(changeData.employee.address)


//==========================================================================================   Project    *********************

<td>
   {!! Form::open(['route' => ['parallax.edit' , $item->id] , 'method' => 'get']) !!}
   {!! Form::submit('تغییرات' , ['class' => 'btn btn-info text-light']) !!}
   {!! Form::close() !!}
</td>
<a href="{{ route('parallax.edit' , ['id' => $item->id]) }}" class="btn btn-info text-light">تغییرات</a>

<td>
   {!! Form::open(['route' => ['parallax.destroy' , $item->id] , 'method' => 'delete']) !!}
   {!! Form::submit('حذف' , ['class' => 'btn btn-danger']) !!}
   {!! Form::close() !!}
</td>

//------------------------------------------------- verta تاریخ شمسی  instance , format

<span><strong>تاریخ : </strong>{{ \Hekmatinasser\Verta\Verta::instance($news->created_at)->format('%d  %B  %Y | H:i:s')  }}</span>  // تاریخ : 09 آبان 1400 | 08:08:37
<span><strong>تاریخ : </strong>{{ \Hekmatinasser\Verta\Verta::instance($news->created_at)->format('Y-m-d | H:i | l')  }}</span>   // تبدیل دستی با فورمت

<span>{{ \Hekmatinasser\Verta\Verta::instance($news->s)->formatWord('%d  %B  %Y | H:i')  }}</span>                // formatWord به صورت متن
<span><strong>تاریخ : </strong>{{ \Hekmatinasser\Verta\Verta::instance($news->s)->formatWord('d F Y')  }}</span>   // ده آبان یک هزار و چهارصد

<span><strong>تاریخ : </strong>{{ \Hekmatinasser\Verta\Verta:: ($news->created_at)  }}</span>       // تبدیل خودکار با اینستنس
// Y سال کامل  |  y سال به صورت ناقص  |  m  ماه عددی  |  M  ماه به حروف    |  d روز به عدد   | D روز به حروف   |  l چند شنبه  | H : i : s    ساعت دقیقه ثانیه




//======================================================================================================================

Auth::routes(['register' => false, 'reset' => false, 'confirm' => false]);  / * reset = forget password * /
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/ *-----  Route Website  -----* /
Route::get('/', [\App\Http\Controllers\IndexController::class, "index"])->name('index');
Route::get('/showNews/{id}', [\App\Http\Controllers\IndexController::class, "showNews"])->name('showNews');
Route::post('/comment', [\App\Http\Controllers\IndexController::class, "comment"])->name('comment');
Route::post("/contact", [\App\Http\Controllers\Administrator\ContactController::class, "store"])->name("contact.store");
Route::get("/search", [\App\Http\Controllers\IndexController::class, "search"])->name('search');
/ *-----  End Route Website -----* /


/ *-----  Route BackEnd  -----* /
Route::middleware('auth')->prefix('administrator/panel')->group(function () {

    Route::get('/admin', [\App\Http\Controllers\Administrator\AdminController::class, "index"])->name('admin');
    Route::resource('/seo', \App\Http\Controllers\Administrator\SeoController::class)->parameters(['seo' => 'id']);
    Route::resource('/parallax', \App\Http\Controllers\Administrator\ParallaxController::class)->parameters(['parallax' => 'id']);
    Route::resource("/link", \App\Http\Controllers\Administrator\LinkController::class)->parameters(['link' => 'id']);
    Route::resource("/news", \App\Http\Controllers\Administrator\NewsController::class)->parameters(['news' => 'id']);
    Route::get("/comment", [\App\Http\Controllers\Administrator\CommentController::class, "index"])->name('comment.index');
    Route::put("/comment/update/{id}", [\App\Http\Controllers\Administrator\CommentController::class, "update"])->name('comment.update');
    Route::delete("comment/destroy/{id}", [\App\Http\Controllers\Administrator\CommentController::class, "destroy"])->name('comment.destroy');
    Route::get("/contact", [\App\Http\Controllers\Administrator\ContactController::class, "index"])->name('contact.index');
    Route::delete("/contact/{id}", [\App\Http\Controllers\Administrator\ContactController::class, "destroy"])->name('contact.destroy');
    Route::resource("/slider", \App\Http\Controllers\Administrator\SliderController::class)->parameters(['slider' => 'id']);

});
/ *-----  End Route BackEnd  -----* /


//------------------------------------------------- global variable  متغیر های سراسری

public function boot()    // execute code
{
    // معرفی میکنیم (ویو) سایت یا ظاهر سایت کد های (بلید) که به صورت کلی از این جا (کامپکت) بشه و نخواهیم هر سری کد بنویسیم و برای تغییر دادن از این قسمت فقط انجام بدیم
    view()->composer(['client.index', 'client.products.show'], function ($view) {
        $view->with([
            'categories' => Category::query()->where('parent_id', '=', null)->get(),
            'brands' => Brand::all(),
        ]);
    });


    Paginator::useBootstrap();   // show bootsrap paginate
}


//========================================================================================== Controller & Model Gallery


class GalleryController extends Controller
{


    public function index(Product $product)
    {
        return view('admin.galleries.index', [
            'product' => $product,
            'galleies' => Gallery::all(),
        ]);
    }



    public function store(ProductGalleryRequest $request, Product $product)
    {
//      $product->addGallery($request);

        $file = $request->file('file');
        $path = $file->storeAs('public/productGallery', $file->getClientOriginalName());

        $product->galleies()->create([
            'product_id' => $product->id,
            'path' => $path,
            'mimes' => $file->getClientMimeType(),   // show type image
        ]);
    }


    public function destroy(Product $product, Gallery $gallery)
    {
//      dd($product->galleies());

        $product->deleteGallery($gallery);
        return back()->with('delete', 'عکس گالری محصول با موفقیت حذف شد');
    }



    //-----------------------------  Model gallery



    public function product()  // مفرد اسم
    {
        return $this->belongsTo(Product::class , 'product_id');   // هر محصول میتونه چندین تا گالری یا عکس داشته باشه | متعلق به محصول
    }

   //------------------------- Model Products  --> Gallery


    public function getRouteKeyName()    // getRouteKeyName | میتونه براس ستون های درون جدول یمقدار بگیره به کل این مادل بده
    {
        return 'slug';  // تو کا پروژه قرار میگیره
    }


    / *
     public function addGallery(Request $request)
    {
        $file = $request->file('file');
        $path = $file->storeAs('public/productGallery' , $file->getClientOriginalName());

        $this->galleies()->create([
            'product_id' => $this->id,
            'path' => $path,
            'mimes' => $file->getClientMimeType(),   // show type image
        ]);
    }* /


    public function deleteGallery(Gallery $gallery)
    {
        Storage::delete($gallery->path);  // unlink | میاد عکس حذف میکنه
        $gallery->delete();
    }


}




//==========================================================================================  Discount تخفیف

//----------------------------- model Discount -----------------------------

public function addDiscount(Request $request)
{

    if (!$this->discount()->exists()) {  / * تخفیفی وجود نداشت | discount() یک کوعری زدیم تا مقداری اضافه بشه * /
        $this->discount()->create([
            'product_id' => $this->id,
            'value' => $request->get('value'),
        ]);
    } else {                             / * اگر تخفیفی وجود داشت بیا آپدیت کن | بدون پرانتز میاد فقط یک رکورد از جدول در نظر میگیره ا اپدیت کنه discount * /
        $this->discount->update([
            'product_id' => $this->id,
            'value' => $request->get('value'),
        ]);
    }

}


public function deleteDiscount(Discount $discount)
{
    $discount->delete();
}


public function updateDiscount(Request $request)
{
    $this->discount()->update([
        'product_id' => $this->id,
        'value' => $request->get('value'),
    ]);
}

//----------------------------- request validation  -----------------------------

'value' => 'required|integer|lte:1|gte:100',      //integer عدد صحیح  |  min:1|max:100  |  lte:1|gte:100  کم و زیاد عدد بهتر

gt - greater than  | بزرگتر از
gte - greater than equal to   |  بزرگتر  مساوی از
lt - less than   |  کوچیکتر از
lte - less than equal to   |  کوچیکتر مساوی از


//----------------------------- Controller  -----------------------------

class DiscoutController extends Controller
{

    public function create(Product $product)
    {
        return view('admin.discounts.create', [
            'product' => $product,
        ]);
    }


    public function store(Product $product, DiscountRequest $request)
    {
//      $product->addDiscount($request);


        if (!$product->discount()->exists()) {    // تخفیفی وجود نداشت | discount() یک کوئری زدیم تا مقداری اضافه بشه

            $product->discount()->create([
                'product_id' => $product->id,
                'value' => $request->get('value'),
            ]);

        } else {                           // اگر تخفیفی وجود داشت بیا آپدیت کن | بدون پرانتز میاد فقط یک رکورد از جدول در نظر میگیره آاپدیت کنه discount
            $product->discount->update([
                'product_id' => $product->id,
                'value' => $request->get('value'),
            ]);
        }
        return redirect(route('product.create'))->with('success', 'تخفیف محصول با موفقیت انجام شد');
    }



    public function edit(Product $product, Discount $discount)
    {
        return view('admin.discounts.edit', [
            'product' => $product,
            'discount' => $discount,
        ]);
    }


    public function update(Product $product, Request $request)
    {
//      $product->updateDiscount($request);
        $product->discount()->update([
            'product_id' => $product->id,
            'value' => $request->get('value'),
        ]);
        return redirect(route('product.create'));
    }


    public function destroy(Product $product, Discount $discount)
    {
        $product->deleteDiscount($discount);
        return redirect(route('product.create'))->with('deleteDiscount', 'تخفیف محصول با موفقیت حذف شد');
    }


}


//========================================================================================== Accessors & Mutators فید های مجازی
//--------------------------- Model Product
public function getPriceWithDiscountAttribute()      // محابسه تخفیف قسمت محصولات | اضافه کردن اول گت آخرش اتریبیوت فیلد مجازی استفاده کنیم
{
    if (!$this->discount()->exists()) {    // اگر تخفیفی وجود نداشت قیمت اصلی نمایش بده
        return $this->price;
    }

    //اول قیمت محصول صد هزار ضرب در مثلا (10%) میشه بعد جواب تقسیم بر (صد) میشه که قیمت تخفیفی بدست میاد بعد از (قیمت محصول اولیه صد تومن کم) میشه که جواب تخفیف قیمت 10 هزار
    return $this->price - $this->price * $this->discount->value / 100;   // الگوریتم تخفیف قیمت
}


//-------------------- showBlade front    -- > price_with_discount  حروف کوچک و آندرلاین
 <span itemprop="price"> {{ number_format($product->price_with_discount) }} تومان


//-------------------- index.blade  front    -- > price_with_discount
<span class="price-new">{{ number_format($product->price_with_discount) }} تومان </span>




//----------------------------------------------  Model Product  -- > has_discount  حروف کوچک و آندرلاین

    public function getHasDiscountAttribute()  // آیا تخفیفی وجود دارد
{
    return $this->discount()->exists();
}

//------------------------- show and index
    @if ($product->has_discount);


//----------------------------------------------- Model Product

    public function getDiscountValueAttribute()    // مقدار تخفیف چند درصد
{
    if ($this->has_discount) {
        return $this->discount->value;
    }
    return null;
}

//------------------------- product.index and index
    <a href="" class="btnWarning">{{ $product->discount_value . '%'}}</a>

    <span class="saving">{{ $product->discount_value . '%' }}</span>



//========================================================================================== seeder

public function run()
{

    // categoried permissions
    Permission::query()->insert([
        [
            'title' => 'create-category',
            'label' => 'ایجاد دسته بندی',
        ],

        [
            'title' => 'read-category',
            'label' => 'مشاهده دسته بندی',
        ],

        [
            'title' => 'update-category',
            'label' => 'ویرایش دسته بندی',
        ],

        [
            'title' => 'delete-category',
            'label' => 'حذف دسته بندی',
        ],
    ]);

}

//----------------- DatabaseSeeder
public function run()
{
    // \App\Models\User::factory(10)->create();
    $this->call([                                   // سییدر هایی که ساختیم پاس میدیم به این قسمت اصلی که تو جدول ما ببره | call صدا زدن سییدر
        PermissionSeeder::class,
        RoleSeeder::class,
    ]);



}


//========================================================================================== permissions $ roles
//---------------------- category permission
public function up()
{
    Schema::create('permissions', function (Blueprint $table) {
        $table->id();
        $table->string('title')->unique();         // create_category  مجوز دسترسی به
        $table->string('label')->unique();         // ایجاد دسته بندی
        $table->timestamps();
    });
}

//---------------------- category roles
public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('title');   // نباید منحصر به فرد باشد زیرا ممکن دو سه تا کاربر نقش ادمین معمولی داشته باشند
        $table->timestamps();
    });
}

//---------------------- category permission_role
public function up()
{
    Schema::create('permission_role', function (Blueprint $table) {
        $table->foreignId('permission_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        $table->foreignId('role_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        $table->primary(['permission_id' , 'role_id']);       // کلید های هر جدول که بیاد منحصر به فرد بسازه
        $table->timestamps();
    });



    //---------------------- sseder (PermissionSeeder) برای بقیه به همین شکل برند ها و دسته بندی و گالری و تخفیف اعدادی و تخفیف محصولات و نقش ها یا رول

    // categoried permissions
    Permission::query()->insert([
        [
            'title' => 'create-category',
            'label' => 'ایجاد دسته بندی',
        ],

        [
            'title' => 'read-category',
            'label' => 'مشاهده دسته بندی',
        ],

        [
            'title' => 'update-category',
            'label' => 'ویرایش دسته بندی',
        ],

        [
            'title' => 'delete-category',
            'label' => 'حذف دسته بندی',
        ],
    ]);

    // dashboard permissions | Dashboard Panel Manager
    Permission::query()->insert([
        [
            'title' => 'view-dashboard',
            'label' => 'مشاهده داشبورد',
        ]
    ]);

    //---------------------- sseder (RoleSeeder)    نقش ها مثل سوپر ادمین یا کاربر عادی

    // super-admin roles  |  create  (created_at  updated_at is full)
    $superAdmin = Role::query()->create([
        'title' => 'super-admin',
    ]);


    // normal-user  |  insert  (created_at  updated_at is null)
    Role::query()->insert([
        'title' => 'normal-user',
    ]);

    $superAdmin->permissions()->attach(Permission::all());  // بیا اضافه کن هرچی پرمیژن یا مجوز که وجود داره دسترسی دارد به سوپر ادمین بده


//------------------------ Model Role    نقش ها (سوپر ادمنی) متلق به کلی مجوز دسترسی مثل دسته بندی و برند ها و محصولات (عملیات کراد)

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);   // نقش ها (سوپر ادمنی) متلق به کلی مجوز دسترسی مثل دسته بندی و برند ها و محصولات (عملیات کراد)
    }


//----------------- DatabaseSeeder
   public function run()
   {
    // \App\Models\User::factory(10)->create();
    $this->call([                                   // سییدر هایی که ساختیم پاس میدیم به این قسمت اصلی که تو جدول ما ببره | call صدا زدن سییدر
        PermissionSeeder::class,
        RoleSeeder::class,
    ]);




//-------------------------- Request Role

return [
    'title' => 'required|string',   // exists:permissions, id | حتما آیدی جدول نقش ها با جدول مجوز دسترسی یکسان باشد و دستکاری نشده باشد
    'permissions' => 'required|array|string|exists:permissions,id|unique:permissions,title',
];

//-------------------------- RoleController

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
//        return redirect(route('role.create'));

    }


}


//-------------------------- Model Role
class Role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);   // نقش ها (سوپر ادمنی) متلق به کلی مجوز دسترسی مثل دسته بندی و برند ها و محصولات (عملیات کراد)
    }

    public function hasPermission($permission)   // اگر وجود داشت پرمیژن آیدی برابر آیدی نقش و بیا select حالت فعال
    {
        return $this->permissions()->where('id' , '=' , $permission->id )->exists();  // اگر آیدی نقش برابر پرمیژن باش و وجود داشت
    }

}


//------------------------------- sleectAll & disableAll -- > radio
//----------------- create.blade.php  (role)


 <input type="checkbox" name="permissions[]" class="checkedAll" value="{{ $permission->id }}">  {{-- checkedAll فعال کردن همه یا برعکس --}}
        <strong>{{ $permission->label }}</strong>{{--permissions[]به صورت آرایه--}}


//--------------- partials.check.blade.php

<script>

    $(function () {

        $('#selectAll').click(function () {   // اگر رو این اینپوت کلیک شد بیا ...
            if ($(this).prop('checked')) {   // prop = بیا حالت فعال کردن دکمه اینپوت قرار بدهاگر کیک شد رو اینپوت غعال کردن همه
                $('.checkedAll').prop('checked', true);
                 $('#disableAll').prop('checked', false);  // ائن یکی اینپوت غیرفعال کن حالت رنگ آبی
            }
        })

        $('#disableAll').click(function () {
            if ($(this).prop('checked')) {   // prop = بیا حالت فعال کردن دکمه اینپوت قرار بدهاگر کیک شد رو اینپوت غعال کردن همه
                $('.checkedAll').prop('checked', false);
                $('#selectAll').prop('checked', false);
            }
        })

    })

</script>



//==========================================================================================


*/
