@extends('client.layouts.app')

@section('titleWeb' , 'مشاهده سبد')


@section('content')

    <div id="container">
        <div class="container">

            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="cart.html">سبد خرید</a></li>
            </ul>
            <!-- Breadcrumb End-->


            @if ($total_items > 0 )

                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h1 class="title">سبد خرید</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered">


                                <thead>
                                <tr>
                                    <td class="text-center">تصویر</td>
                                    <td class="text-left">نام محصول</td>
                                    <td class="text-left">برند</td>
                                    <td class="text-left">تعداد</td>
                                    <td class="text-right">قیمت یک محصول</td>
                                    <td class="text-right">جمع کل</td>
                                </tr>
                                </thead>


                                @foreach ($items as $item)

                                    @php
                                        $product = $item['product'];
                                        $productQty = $item['quantity'];
                                        $totalPrice = \App\Models\Card::totalPrice();
                                        $totalPriceAll = \App\Models\Card::totalPriceAll();
                                    @endphp

                                    <tbody id="cart-index">   {{-- remove list cart --}}
                                    <tr>
                                        <td class="text-center"><a href="{{ route('client.productDetails.show' , $product) }}">
                                                <img class="img-thumbnail" title="{{ $product->name }}" alt="{{ $product->name }}"
                                                     src="{{ asset('./' .str_replace('public/image-products/' , 'storage/image-products/' , $product->image)) }}"
                                                     height="70" width="70"></a>
                                        <td class="text-left"><a href="{{ route('client.productDetails.show' , $product) }}">{{ $product->name }}</a><br>
                                        <td class="text-left">{{ $product->brand->name }}</td>
                                        <td class="text-left"><div class="input-group btn-block quantity">
                                                <input id="input-quantity{{$product->id}}" type="number" name="quantity" value="{{ $productQty }}" size="1" class="form-control">
                                                <span class="input-group-btn">
                                       <button type="submit" data-toggle="tooltip" class="btn btn-primary" onclick="updateCart({{$product->id}})" data-original-title="بروزرسانی">
                                         <i class="fa fa-refresh"></i></button>
                                         <button type="button" data-toggle="tooltip" class="btn btn-danger" onclick="removeFromCart({{$product->id}})" data-original-title="حذف">
                                         <i class="fa fa-times-circle"></i></button></span></div></td>

                                        <td class="text-right">
                                            @if ($product->has_discount) <span class=""><del style="color: crimson">{{ number_format($product->price) }}</del>
                                             <br/> {{ number_format($product->price_with_discount) }}</span>
                                            @else {{ number_format($product->price_with_discount) }}  @endif تومان
                                        </td>
                                        {{--تعداد محصول ضرب در قیمت تخفیفی یا عادی--}}
                                        <td id="totals-amount-{{$product->id}}" class="text-right">{{number_format($product->price_with_discount * $productQty)}} تومان</td>ا
                                    </tr>
                                    </tbody>

                                @endforeach


                            </table>
                        </div>


                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-8">
                                <table class="table table-bordered">

                                    <tbody>
                                    <tr>
                                        <td class="text-right"><strong>جمع کل :</strong></td>
                                        <td class="cart-all-totalPrice text-right">
                                            @if (\App\Models\Card::totalPrice() === null)
                                                {{ "خالی" }}

                                            @elseif(\App\Models\Card::totalPrice())
                                                @if ($product->has_discount) <span class=""><del style="color: crimson">{{ number_format($total_price_all) }}</del>
                                             <br/> {{ number_format(\App\Models\Card::totalPrice()) }}</span>
                                                @else {{ number_format(\App\Models\Card::totalPrice()) }}   @endif تومان
                                            @endif


                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="text-right"><strong>قابل پرداخت :</strong></td>
                                        <td class="cart-totalPrice text-right text-primary" style="font-weight: bold">{{ number_format($total_price) }} تومان
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="buttons">
                            <div class="pull-left"><a href="{{ route('client.orders.create') }}" class="btn btn-default">ادامه خرید</a></div>
                        </div>
                    </div>
                    <!--Middle Part End -->
                </div>



            @else

                <div class="row">
                    <h1 class="text-center text-danger">سبد خرید خالی است!</h1>
                </div>

            @endif




        </div>
    </div>

@endsection

