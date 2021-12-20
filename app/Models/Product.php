<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed id
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];                    // delete data in the column deleted_at
    protected $appends = [                          // متغیر هایی که نیاز داریم از طریق append فراخوانی بشه به ما میده
        'price_with_discount',
//       'image_path',
//      'has_discount'
    ];

    //---------------------------------------------------

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');  // هر محصول برای یک دسته بندی و دسته محصولات برده متلق به جدول دسته بندی
    }

//---------------------------------------------------

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');  // هر محصول برای یک برند و دسته محصولات برده متلق به جدول دسته بندی
    }

    //---------------------------------------------------

    public function galleies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Gallery::class, 'product_id');   // هر محصول میتونه کلی گالری داشته باشه
    }

    //--------------------------------------------------- slug

    public function getRouteKeyName(): string    // getRouteKeyName | میتونه براس ستون های درون جدول یمقدار بگیره به کل این مادل بده
    {
//      return 'slug'; // تو کا پروژه قرار میگیره

        //رکوست ها روت ها که درون پرفیکس برای سمت ادمین بودن فقط اسلاگ
        /*if (\request()->route()->getPrefix() === '/adminPanel' ||
            \request()->routeIs(['client.home', 'likes.wishList.index', 'client.orders.create', 'client.cart.index'])) {
            return 'slug';

        } else {
            $identifier = Route::current()->parameters()['product'];  // پارامتر های جاری یوت پروداکت میگیره
            if (!ctype_digit($identifier)) {  //ctype_digit --> type number is true اگر عدد نبود پارامترز اسلاگ برگردون اگه عدد بود آیدی
                return 'slug';
            }
            return 'id';
        }*/

        if (\request()->routeIs([
            'client.likes.wishList.index', 'client.likes.store', 'client.likes.destroy',
            'client.cart.index', 'client.cart.store', 'client.cart.destroy'])) {
            return 'id';  //اگه جز بالایی بودن آیدی بگیر وگرنه اسلاگ

        } else {

            return 'slug';
        }

    }


    //--------------------------------------------------- Mutator Accessor  (is_liked) // show red like

    public function getIsLikedAttribute(): bool
    {
        return $this->likes()->where('user_id', '=', auth()->id())->exists();    // return boolean | آیدی کاربری که لاگین کرده برابر آیدی جدول لایک
    }


    //---------------------------------------------------

    public function discount(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Discount::class, 'product_id');   // هر محصول یک تخفیف دارد رابطه (one to one)
    }

    //---------------------------------------------------  relationship product & property(subtitle propertyGroup)

    public function properties(): \Illuminate\Database\Eloquent\Relations\BelongsToMany  // زیر مجموعه مشخصات محصول متعلق به تعداد زیادی از محصولات
    {
        return $this->belongsToMany(Property::class)->withPivot(['value'])
            ->withTimestamps(); //withTimestamps مثل قبلی برای اضافه کردن تایم اسمپ //withPivot جدول (پیوت) فقط برای آیدی ها این جا (ولیو) اضافی با این اضافه میکنیم در نظر بگیره
    }

    //-------------------------------------------------- comments

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'product_id');  // هر محصول تعداد زیادی دارد کامنت
    }

    //-------------------------------------------------- comments
    public function likes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'likes')->withTimestamps();  // table=like چون تلفیقی از دو جدولم نیست بهتر بنویسیم
    }




    //--------------------------------------------------- Gallery

    /*  public function addGallery(Request $request)
    {
        $file = $request->file('file');
        $path = $file->storeAs('public/productGallery' , $file->getClientOriginalName());

        $this->galleies()->create([
            'product_id' => $this->id,
            'path' => $path,
            'mimes' => $file->getClientMimeType(),   // show type image
        ]);
    }*/


    public function deleteGallery(Gallery $gallery)
    {
        Storage::delete($gallery->path);  // unlink | میاد عکس حذف میکنه
        $gallery->delete();
    }

    //--------------------------------------------------- Discount

    /*public function addDiscount(Request $request)
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

    }*/


    public function deleteDiscount(Discount $discount)
    {
        $discount->delete();
    }

    /*public function updateDiscount(Request $request)
    {
        $this->discount()->update([
            'product_id' => $this->id,
            'value' => $request->get('value'),
        ]);
    }*/

    //--------------------------------------------------- Mutators

    public function getPriceWithDiscountAttribute()      // محابسه تخفیف قسمت محصولات | اضافه کردن اول گت آخرش اتریبیوت فیلد مجازی استفاده کنیم
    {
        if (!$this->discount()->exists()) {    // اگر تخفیفی وجود نداشت قیمت اصلی نمایش بده
            return $this->price;
        }

        //اول قیمت محصول صد هزار ضرب در مثلا (10%) میشه بعد جواب تقسیم بر (صد) میشه که قیمت تخفیفی بدست میاد بعد از (قیمت محصول اولیه صد تومن کم) میشه که جواب تخفیف قیمت 10 هزار
        return $this->price - $this->price * $this->discount->value / 100;   // الگوریتم تخفیف قیمت
    }


    public function getHasDiscountAttribute(): bool  // آیا تخفیفی وجود دارد
    {
        return $this->discount()->exists();
    }


    public function getDiscountValueAttribute()    // مقدار تخفیف چند درصد
    {
        if ($this->has_discount) {
            return $this->discount->value;
        }
        return null;
    }


}
