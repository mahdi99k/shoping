<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Product;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function store(Request $request, Product $product)
    {
//      $product = Product::query()->find($request->get('productId'));

        Card::newCard($product, $request);
        return response(['msg' => 'success', session()->get('cart')], 200);    //toArray() تبدیل به آرایه بع صورت جیسون
    }

}
