<?php


use App\Http\Controllers\AdminController\BrandController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\ClientController\CategoryController as ClientCategoryController;
use App\Http\Controllers\AdminController\DiscoutController;
use App\Http\Controllers\AdminController\FeaturedCategoryController;
use App\Http\Controllers\AdminController\GalleryController;
use App\Http\Controllers\AdminController\OfferController;
use App\Http\Controllers\AdminController\PanelController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\AdminController\ProductPropertyController;
use App\Http\Controllers\AdminController\PropertyController;
use App\Http\Controllers\AdminController\PropertyGroupController;
use App\Http\Controllers\AdminController\RoleController;
use App\Http\Controllers\AdminController\SliderController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\ClientController\CardController;
use App\Http\Controllers\ClientController\CommentController;
use App\Http\Controllers\AdminController\CommentController as AdminCommentController;
use App\Http\Controllers\ClientController\LikeController;
use App\Http\Controllers\ClientController\LoginController;
use App\Http\Controllers\ClientController\OrderController;
use App\Http\Controllers\ClientController\ProductController as ClientProductController;
use App\Http\Controllers\ClientController\IndexController;
use App\Http\Controllers\ClientController\ProductSearchController;
use App\Http\Controllers\ClientController\ProfileController;
use App\Http\Controllers\ClientController\RegisterController;
use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Route;




/* Route Website */
Route::prefix('')->name('client.')->group(function () {

    //product:
    Route::get("/", [IndexController::class, "index"])->name('home');
    Route::get('/productDetails/{product}', [ClientProductController::class, "show"])->name('productDetails.show'); /* صفحه تکی مشخصات محصول */
    Route::post('/product/{product}/comments/store', [CommentController::class, "store"])->name('product.commects.store'); /* صفحه تکی مشخصات محصول */
    Route::get('/likes/wishList', [LikeController::class, "index"])->name('likes.wishList.index');
    Route::post('/likes/{product}', [LikeController::class, "store"])->name('likes.store');
    Route::delete('/likes/{product}', [LikeController::class, "destroy"])->name('likes.destroy');

    //register:
    Route::get('/register', [RegisterController::class, "create"])->name('register');  /* صفحه ثبت نام */
    Route::post('/register/sendmail', [RegisterController::class, "sendMail"])->name('register.sendmail'); /* مشخصات کاربر و ارسال کد به otp */
    Route::get('/register/otp/{user}', [RegisterController::class, "otp"])->name('register.otp'); /* ارسال کد تایید به ایمیل */
    Route::post('/register/verifiedOtp/{user}', [RegisterController::class, "verifiedOtp"])->name('register.verifiedOtp'); /* صفحه تایید ایمیل و لاگین شدن */
    Route::delete('/logout', [RegisterController::class, "logout"])->name('logout');
    Route::middleware('auth')->group(function () {   //create password  | لاگین باشد تا ببینه
        Route::get('/changeUserPassword/edit', [RegisterController::class, "changeUserPassword_edit"])->name('changeUserPassword.edit');
        Route::patch('/changeUserPassword/update', [RegisterController::class, "changeUserPassword_update"])->name('changeUserPassword.update');
    });

    //login:
    Route::middleware('guest')->group(function () {  //اگر لاگین بود نتونه ببینه صفحه ورود که بار اضافی بیاره رو سرور
        Route::get('/login/create', [LoginController::class, "create"])->name('login.create');
        Route::post('/login/store', [LoginController::class, "store"])->name('login.store');
        Route::get('/login/google', [LoginController::class, "redirectToProvider"])->name('login.google');  //socialite نمایش جیمیل کاربر
        Route::get('/login/google/callback', [LoginController::class, "handleProviderCallback"]);  //socialite لاگین بود ورود اگر نبود ثبت نام بکنه
    });

    //userProfile:
    Route::middleware('auth')->group(function () {  // فقط لاگین باش پروفایل کاربری میبینه
        Route::get('/myProfile', [ProfileController::class, "edit"])->name('myProfile.edit');  //create prodile
        Route::patch('/myProfile', [ProfileController::class, "update"])->name('myProfile.update');
        Route::get('/myProfile/changePassword/edit', [ProfileController::class, "changePassword_edit"])->name('myProfile.changePassword.edit');//cgange password
        Route::patch('/myProfile/changePassword/update', [ProfileController::class, "changePassword_update"])->name('myProfile.changePassword.update');
    });

    //Cart:
    Route::get('/card/', [CardController::class, "index"])->name('cart.index');
    Route::post('/card/{product}', [CardController::class, "store"])->name('cart.store');
    Route::delete('/card/{product}', [CardController::class, "destroy"])->name('cart.destroy');

    //orders
    Route::get('/orders/create', [OrderController::class, "create"])->name('orders.create');
    Route::post('/orders/store', [OrderController::class, "store"])->name('orders.store');
    Route::get('/orders/payment/callback', [OrderController::class, "callback"])->name('orders.callback');  // گرفتن پیام پرداخت یا عدم پرداخت پول
    Route::get('/orders/{order}', [OrderController::class, "show"])->name('orders.show');  //نمایش پیام موفقیت یا عدم موفقیت پرداخت پول

    //category
    Route::get('/category/{category}', [ClientCategoryController::class, "index"])->name('category.index');
    Route::get('/getChildCategory/{childCategory}', [ClientCategoryController::class, "getChild"])->name('category.getChild');
    Route::get('/getsubtitle/{subtitle}', [ClientCategoryController::class, "subtitle"])->name('category.subtitle');

    //productSearch:
    Route::post('/product/search', [ProductSearchController::class, "fetchData"]);  //LiveSearch 5,50000 product

});
/* End Route Website */


//**********************************************************************************************************************


/* Route BackEnd */
Route::prefix('adminPanel')->middleware([/*CheckPermission::class . ':view-dashboard',*/ /*'auth'*/])->group(function () {

    Route::resource("/", PanelController::class);
    Route::resource("/category", CategoryController::class)->parameters(['category' => 'id']);
    Route::resource("/brands", BrandController::class)->parameters(['brands' => 'id']);

    //product:
    Route::resource('/product', ProductController::class);/*->parameters(['product' => 'id'])*/
    Route::resource('/product.gallery', GalleryController::class);  // ساخت پارامتر برای محصول و گالری با نقطه
    Route::resource('/product.discount', DiscoutController::class);
    Route::resource('/offer', OfferController::class);
    Route::resource('/slider', SliderController::class);
    Route::get('/product/{product}/comments', [AdminCommentController::class, "index"])->name('product.comments.index');
    Route::get('/product/{product}/comments/show', [AdminCommentController::class, "show"])->name('product.comments.show');
    /*Route::get('/comments/{comment}/edit', [AdminCommentController::class, "edit"])->name('product.comments.edit');*/
    Route::patch('/comments/{comment}/update', [AdminCommentController::class, "update"])->name('product.comments.update');
    Route::delete('/comments/{comment}/destroy', [AdminCommentController::class, "destroy"])->name('product.comments.destroy');

    //productProperty:
    Route::get('/products/{product}/properties', [ProductPropertyController::class, "index"])->name('product.properties.index');
    Route::get('/products/{product}/properties/create', [ProductPropertyController::class, "create"])->name('product.properties.create');
    Route::post('/products/{product}/properties', [ProductPropertyController::class, "store"])->name('product.properties.store');

    //productGroup_&_property:
    Route::resource('/propertyGroup', PropertyGroupController::class)->parameters(['propertyGroup' => 'id']);  /* گروه مشخصات */
    Route::resource('/properties', PropertyController::class)->parameters(['properties' => 'id']); /* زیرمجموعه گروه مشخصات */

    Route::resource('/role', RoleController::class)->parameters(['role' => 'id']);
    Route::resource('/user', UserController::class)->parameters(['user' => 'id']);

    //Category
    Route::get('/featuredCategory/create', [FeaturedCategoryController::class, "create"])->name('featuredCategory.create');
    Route::post('/featuredCategory/store', [FeaturedCategoryController::class, "store"])->name('featuredCategory.store');

});
/* End Route BackEnd */
