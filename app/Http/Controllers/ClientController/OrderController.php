<?php

namespace App\Http\Controllers\ClientController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest\OrderRequest;
use App\Models\Card;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class OrderController extends Controller
{

    public function create()
    {
        return view('client.orders.create', [
            'items' => Card::getItems(),
            'total_items' => Card::totalItems(),
            'total_price' => Card::totalPrice(),
            'total_price_all' => Card::totalPriceAll()
        ]);
    }


    public function store(OrderRequest $request)
    {
        $order = Order::query()->create([
            'price' => Card::totalPrice(),            //all price,price discount
            'address' => $request->get('address'),
        ]);


        foreach (Card::getItems() as $item) {
            $product = $item['product'];
            $productQty = $item['quantity'];

            $order->details()->create([
                'product_id' => $product->id,
                'count' => $productQty,  //length
                'unit_price' => $product->price_with_discount,  //price,price discount
                'total_price' => $productQty * $product->price_with_discount, //price * quantity
            ]);
        }
        Card::removeAllItems();

        $invoice = (new Invoice)->amount($order->price);  //all price ,price discount
        //A)invoice صورت حساب   B)callback $driver درگاه پرداختی که استفاده میکنیم $transactionId شماره تراکنش
        return Payment::purchase($invoice, function ($driver, $transactionId) use ($order) {
            $order->update([
                'transaction_id' => $transactionId,
            ]);
        })->pay()->render();  //پرداخت کن | رندر بکن کد ها
//      return back();
    }


    public function callback(Request $request)
    {
        $order = Order::query()->where('transaction_id', '=', $request->get('Authority'))->first();
        $order->update([
            'payment_status' => $request->get('Status'),  //علامت اوکی میده واس خود زرین پال | update -> OK
        ]);
        return redirect(route('client.orders.show', $order));
    }


    public function show(Order $order)
    {
        return view('client.orders.show', [
            'order' => $order
        ]);
    }


}
