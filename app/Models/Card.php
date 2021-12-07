<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Card extends Model
{
    use HasFactory;
//  protected $guarded = ['id'];

    public static function newCard(Product $product , Request $request)
    {
        if (session()->has('cart')) {       //اگر سشن کارت یا سبد خرید وجود داشت بیا بگیر سشن
            $cart = session()->get('cart');
        }

        $cart[$product->id] = [                              //$cart[$product->id] میاد اول و آخر آرایه چک میکنه اگر وجود داشت اضافه نکنه | برای جلوگیری از تکرار نوشتیم
            'product' => $product ,
            'quantity' => $request->get('quantity'),
        ];

//        $cart['total_items']

        session()->put([     //put (قرار دادن) -> insert
            'cart' => $cart,
        ]);

    }

}
