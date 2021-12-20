@extends('client.layouts.app')

@section('titleWeb' , 'ثبت سفارش')



@section('content')

    <div id="container">
        <div class="container">

            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="cart.html">سبد خرید</a></li>
                <li><a href="checkout.html">ثبت سفارش</a></li>
            </ul>
            <!-- Breadcrumb End-->


            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">ثبت سفارش</h1>

                    <form action="{{ route('client.orders.store') }}" method="post">
                        @csrf

                        <div class="row">


                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-ticket"></i> استفاده از کوپن تخفیف</h4>
                                    </div>
                                    <div class="panel-body">
                                        <label for="input-coupon" class="col-sm-3 control-label">کد تخفیف خود را وارد کنید</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="input-coupon" placeholder="کد تخفیف خود را وارد کنید" name="offer_code">
                                            <span class="input-group-btn">
                                            <input type="button" class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-coupon" value="اعمال کوپن">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">

                                                <thead>
                                                <tr>
                                                    <td class="text-center">تصویر</td>
                                                    <td class="text-left">نام محصول</td>
                                                    <td class="text-left">برند</td>
                                                    <td class="text-right">تعداد</td>
                                                    <td class="text-right">قیمت یک محصول</td>
                                                    <td class="text-right">جمع</td>
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
                                                                <input id="input-quantity{{$product->id}}" type="number" name="quantity" value="{{ $productQty }}"
                                                                       size="1" class="form-control">
                                                                <span class="input-group-btn">
                                                     <button type="button" data-toggle="tooltip" class="btn btn-primary" onclick="updateCart({{$product->id}})"                                                                      data-original-title="بروزرسانی"> <i class="fa fa-refresh"></i></button>

                                                      <button type="button" data-toggle="tooltip" class="btn btn-danger" onclick="removeFromCart({{$product->id}})"                                                                   data-original-title="حذف"> <i class="fa fa-times-circle"></i></button></span></div></td>


                                                        <td class="text-right">
                                                            @if ($product->has_discount) <span class=""><del style="color: crimson">{{ number_format($product->price) }}</del>
                                                           <br/> {{ number_format($product->price_with_discount) }}</span>
                                                            @else {{ number_format($product->price_with_discount) }}تومان  @endif تومان
                                                        </td>
                                                        {{--تعداد محصول ضرب در قیمت تخفیفی یا عادی--}}
                                                        <td id="totals-amount-{{$product->id}}"
                                                            class="text-right">{{number_format($product->price_with_discount * $productQty)}} تومان</td>ا
                                                    </tr>
                                                    </tbody>

                                                @endforeach



                                                <tfoot>

                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>جمع کل :</strong></td>
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
                                                    <td class="text-right" colspan="4"><strong>مجموع قابل پرداخت :</strong></td>
                                                    <td class="cart-totalPrice text-right text-primary" style="font-weight: bold">{{ number_format($total_price) }} تومان
                                                </tr>

                                                </tfoot>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-pencil"></i>افزودن آدرس</h4>
                                    </div>
                                    <div class="panel-body">

                                        <textarea rows="4" class="form-control" id="confirm_address" name="address" style="resize: none;height: 120px"></textarea>
                                        <br>
                                        {{--<label class="control-label" for="confirm_agree">
                                            <input type="checkbox" checked="checked" value="1" required=""
                                                   class="validate required" id="confirm_agree" name="confirm agree">
                                            <span><a class="agree" href="#"><b>شرایط و قوانین</b></a> را خوانده ام و با آنها موافق هستم.</span>
                                        </label>--}}
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <input type="submit" class="btn btn-primary" id="button-confirm" value="تایید سفارش">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-warning">@include('admin.partials._errors')</p>

                                </div>
                            </div>


                        </div>

                    </form>

                </div>
                <!--Middle Part End -->
            </div>

        </div>
    </div>

@endsection
