@if (\App\Models\Card::totalItems() > 0)


    <ul class="dropdown-menu">
        <li>'

            <table id="cart-menu" class="table">
                <tbody id="cart-table-body">

                @forelse (\App\Models\Card::getItems() as $item)

                    @php
                        $product = $item['product'];
                        $productQty = $item['quantity'];
                    @endphp

                    <tr id="cart-row{{$product->id}}">
                        <td class="text-center"><a href="{{ route('client.productDetails.show' , $product) }}">
                                <img class="img-thumbnail" title="{{ $product->name }}" alt="{{ $product->name }}"
                                     src="{{ asset('./' .str_replace('public/image-products/' , 'storage/image-products/' , $product->image)) }}"
                                     height="60" width="60"></a>
                        </td>
                        <td class="text-left"><a href="{{ route('client.productDetails.show' , $product) }}" style="font-size: 14px">
                                {{ \Illuminate\Support\Str::limit($product->name , 20) }}</a></td>
                        <td id="product-quantity-{{$product->id}}" class="text-right">x {{ $productQty }}</td>
                        <td class="text-right">{{ number_format($product->price_with_discount) }}تومان
                            @if ($product->has_discount) <span class=""><del
                                    style="color: crimson">{{ number_format($product->price) }}</del></span> @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-xs remove" title="حذف"
                                    onClick="removeFromCart({{$product->id}})" type="button"><i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>

                @empty
                @endforelse

                </tbody>
            </table>
        </li>


        <li>
            <div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="text-right"><strong>جمع کل</strong></td>
                        <td class="text-right cart-all-totalPrice">
                            <del>{{ number_format(\App\Models\Card::totalPriceAll()) }}</del>
                            تومان
                        </td>
                    </tr>
                    {{-- <tr>
                         <td class="text-right"><strong>کسر هدیه</strong></td>
                         <td class="text-right">4000 تومان</td>
                     </tr>
                     <tr>
                         <td class="text-right"><strong>مالیات</strong></td>
                         <td class="text-right">11880 تومان</td>
                     </tr>--}}
                    <tr>
                        <td class="text-right"><strong>قابل پرداخت</strong></td>
                        <td class="text-right cart-totalPrice">{{ number_format(\App\Models\Card::totalPrice()) }}
                            تومان
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p class="checkout">
                    <a href="{{ route('client.cart.index') }}" class="btn btn-primary" target="_blank"><i
                            class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ route('client.orders.create') }}" class="btn btn-primary" target="_blank"><i
                            class="fa fa-share"></i>ثبت سفارش</a></p>
            </div>
        </li>

    </ul>


@endif

