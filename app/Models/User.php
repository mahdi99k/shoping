<?php

namespace App\Models;

use App\Mail\OtpMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed id
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
        'role_id', 'avatar', 'google_id'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //----------------------------- role BelongsTo
    /**
     * @var mixed
     */
    private $role;

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    //----------------------------- comment

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');  // هر کاربر تعداد زیادی دارد کامنت
    }

    //----------------------------- like
    public function likes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'likes')->withTimestamps();   // table=like چون تلفیقی از دو جدولم نیست بهتر بنویسیم
    }

    //***************************************************************************


    //---------------------------- likeProduct
    public function likeProduct(Product $product)
    {
        $isLikedBefore = $this->likes()->where('id', '=', $product->id)->exists();  //دوبار توی یک جدول بود از یک دیتا بیا جذف کن اگر یک بار بود اضافه
        if ($isLikedBefore) {
            return $this->likes()->detach($product);
        }
        return $this->likes()->attach($product);  // sync update just one table(column) , for many click button likes
    }


    //----------------------------- sendMail

    public static function generateOtp(Request $request)
    {
        $otp = random_int(11111, 99999);

        $userQuery = User::query()->where('email', $request->get('email'))->first(); // user email == email database
//        if ($userQuery->exists()) {
        if ($userQuery) {
            $user = $userQuery;
            $user->update([    // اگر ایمیل وارد شده در دیتابیس مجود بود بیا رمز عبور آپدیت کن
                'password' => bcrypt($otp),
            ]);

        } else {
            $user = User::query()->create([
                'name' => '',
                'email' => $request->get('email'),
                'password' => bcrypt($otp),  // hash security in database
                'role_id' => Role::findByTitle('normal-user')->id, //هر گاربری ثبت نام میکنه پیش فرض نرمال یوزر
            ]);
        }

        // send otp by email to user
        Mail::to($user->email)->send(new OtpMail($otp));   // to بفرست برای ایمیل کاربر | send این کد 5 رقمی ارسال کن
        return $user;
    }


}
