<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Card extends Model
{
    use HasFactory;

//  protected $guarded = ['id'];

    public static function newCard(Product $product, Request $request)
    {
        if (session()->has('cart')) {       //اگر سشن کارت یا سبد خرید وجود داشت بیا بگیر سشن
            $cart = self::getItems();      //درونش سشن هست و حالت کالکشن و مجموعه ای
        }


        $cart[$product->id] = [                              //$cart[$product->id] میاد اول و آخر آرایه چک میکنه اگر وجود داشت اضافه نکنه | برای جلوگیری از تکرار نوشتیم
            'product' => $product,
            'quantity' => $request->get('quantity'),
        ];


        session()->put([     //قبل اینکه اضافه کنه آپدیت میکنه و بدون رفرش قرار میگیره
            'cart' => $cart,
        ]);


        $cart['total_items'] = self::totalItems();          //جمع کل تعداد موارد | count($cart)
        $cart['total_price'] = number_format(self::totalPrice());             //جمع کل مبلغ | Card === self
        $cart['total_price_all'] = number_format(self::totalPriceAll());      //جمع کل بدون تخفیف
//      $cart['price_with_discount'] = number_format(self::getPriceWithDiscount($product));      //جمع کل بدون تخفیف | روش قدیمی


        session()->put([     //put (قرار دادن) -> insert
            'cart' => $cart,
        ]);

    }

    //--------------------------------------------------------------------------

    //for count items(products)
    public static function getItems()
    {
        return collect(self::getSessionCart())->filter(function ($items) {   //collect مجموعه ای
            return is_array($items);  //اگر رایه بود
        });
    }


    public static function totalItems()
    {
        $items = self::getItems();
        return count($items); //array count()
    }


    public static function totalPrice()
    {
        $totalPrice = 0;
        if (self::getSessionCart()) {       //exist session
            foreach (self::getSessionCart() as $cartItem) {

                if (is_array($cartItem) && array_key_exists('product', $cartItem) && array_key_exists('quantity', $cartItem)) { //اگر آرایه بود و key آرایه وجود داشت

                    $totalPrice += $cartItem['product']->price_with_discount * $cartItem['quantity'];  //قیمت صفر به اضافه قیمت محصول(با تخفیف یا عادی) و ضرب در تعداد محصول
//                  $totalPrice = $totalPrice + $cartItem['product']->price_with_discount * $cartItem['quantity'];
                }
            }
        }
        return $totalPrice;
    }


    public static function totalPriceAll()
    {
        $totalPrice = 0;
        if (self::getSessionCart()) {       //exist session
            foreach (self::getSessionCart() as $cartItem) {

                if (is_array($cartItem) && array_key_exists('product', $cartItem) && array_key_exists('quantity', $cartItem)) { //اگر آرایه بود و key آرایه وجود داشت

                    $totalPrice += $cartItem['product']->price * $cartItem['quantity'];  //قیمت صفر به اضافه قیمت محصول(با تخفیف یا عادی) و ضرب در تعداد محصول
//                  $totalPrice = $totalPrice + $cartItem['product']->price_with_discount * $cartItem['quantity'];
                }
            }
        }
        return $totalPrice;
    }


    public static function getSessionCart()
    {

        if (!session()->has('cart')) {   //اگر وجود نداشت سشن کارت
            return null;
        } else {
            return session()->get('cart');
        }

    }


    public static function remove(Product $product)
    {
        if (session()->has('cart')) {
            $cart = self::getItems();
        }

        $cart->forget($product->id);  //forget delete session

        session()->put([     //قبل اینکه اضافه کنه آپدیت میکنه و بدون رفرش قرار میگیره
            'cart' => $cart,
        ]);

        //updated after forget cart(delete)
        $cart['total_items'] = self::totalItems();          //جمع کل تعداد موارد | count($cart)
        $cart['total_price'] = self::totalPrice();             //جمع کل مبلغ | Card === self
        $cart['total_price_all'] = self::totalPriceAll();      //جمع کل بدون تخفیف

        session()->put([     //put (قرار دادن) -> insert
            'cart' => $cart,
        ]);
    }


    public function getImagePathAttribute()
    {
        return str_replace('/public/image-products/', '/storage/image-products/', $this->image);
    }


    public static function removeAllItems()
    {
        session()->forget('cart');  //remove all session
    }


    /*public static function getPriceWithDiscount(Product $product) // محابسه تخفیف قسمت محصولات | اضافه کردن اول گت آخرش اتریبیوت فیلد مجازی استفاده کنیم
    {
        if (!$product->discount()->exists()) {    // اگر تخفیفی وجود نداشت قیمت اصلی نمایش بده
            return $product->price;
        }

        //اول قیمت محصول صد هزار ضرب در مثلا (10%) میشه بعد جواب تقسیم بر (صد) میشه که قیمت تخفیفی بدست میاد بعد از (قیمت محصول اولیه صد تومن کم) میشه که جواب تخفیف قیمت 10 هزار
        return $product->price - $product->price * $product->discount->value / 100; // الگوریتم تخفیف قیمت
    }*/


}
