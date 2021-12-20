<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Product;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function index()
    {
      return  view('client.cart.index', [
            'items' => Card::getItems(),
            'total_items' => Card::totalItems(),
            'total_price' => Card::totalPrice(),
            'total_price_all' => Card::totalPriceAll()
        ]);
    }


    public function store(Request $request, Product $product)
    {
//      $product = Product::query()->find($request->get('productId'));

        Card::newCard($product, $request);
        return response(['msg' => 'success', 'cart' => Card::getSessionCart()], 200);    //toArray() تبدیل به آرایه بع صورت جیسون
    }


    public function destroy(Product $product)
    {
        Card::remove($product);
        return response(['msg' => 'removed', 'cart' => Card::getSessionCart()]);
    }


}
