<!--Footer Start-->
@include('client.layouts.childFooter._footerChild')
<!--Footer End-->

<!-- Twitter Side Block Start -->
@include('client.layouts.childFooter._twitter')
<!-- Twitter Side Block End -->

<!-- Facebook Side Block Start -->
@include('client.layouts.childFooter._facebook')
<!-- Facebook Side Block End -->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="/client/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/client/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/client/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/client/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/client/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/client/js/custom.js"></script>

<script>

    function likeProduct(productId) {         //لایک محصول
        $.ajax({
            type: 'post',
            url: '/likes/' + productId,
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                var icon = $('#like-' + productId + '>.fa-heart');                       // connect icon heart

                if (icon.hasClass('like')) {
                    icon.removeClass('like')
                } else {
                    icon.addClass('like')
                }

                $('#likes_count').text(data.likes_count)                                // get data (likes_count)
            }
        });
    }
    {{-- <button id="like-{ { $product->id }}" type="button" onClick=likeProduct({ { $product->id }})><i class="fa fa-heart"></i> افزودن به علاقه مندی ها</button> --}}



    function addToCart(productId) {            //اضافه کردن محصول

        let quantity = 1;   //page home low one quantity product حداقل یک محصول در نظر بگیره در صفحه اصلی که تعداد نداره

        if ($('#input-quantity').length) {     //if more 1 product go to quantity  |  $('#input-quantity').length > 1
            quantity = $('#input-quantity').val();    //value input-quantity
        }

        $.ajax({
            type: 'post',
            url: '/card/' + productId,
            data: {
                _token: "{{ csrf_token() }}",
                productId: productId,
                quantity: quantity,   //number product
            },

            success: function (data) {
                //show product صفحه نمایش محصول
                $('#product-quantity-' + productId).text('x' + quantity);  /* تعداد محصول */
                $('.cart-totalPrice').text(data.cart.total_price)          /* قیمت محصول */

                $('#total_items').text(data.cart.total_items);  //quantity
                $('#total_price').text(data.cart.total_price);  //price

                //append html code
                let product = data.cart[productId]['product'];   //به حالت جی کوئری بگیریم
                let productQty = data.cart[productId]['quantity'];
                // let productPrice = data.cart.price_with_discount;  //get session

                if (!$('#cart-row' + productId).length) {   //اگر آیدی محصول صفر بود بیا بساز وگرنه اجازه نده

                    $('#cart-table-body:last-child').append(      //last-child = آخر خط من اضافه میکنه | append اضافه کن
                        /*'<tr id="cart-row'+product.id+'">' // اولشون یک پلاس بعد هر td درون تک کوتیشن میزاریم
                        + '<td class="text-center"><a href="/productDetails/'+ product.slug +'"> <img class="img-thumbnail" title="'+ product.name +'" alt="'+ product.name +'" src="{ { asset('./' .str_replace('public/image-products/' , 'storage/image-products/' , $product->image)) }}" height="60" width="60"></a> </td>'
                        // + '<td class="text-center"><a href="/productDetails/'+ product.slug +'"> <img class="img-thumbnail" title="'+ product.name +'" alt="'+ product.name +'" src=" '+product.image_path+'" height="60" width="60"></a> </td>'
                        + '<td class="text-left"><a href="/productDetails/'+ product.slug +'" style="font-size: 14px">{ { \Illuminate\Support\Str::limit($product->name , 20) }}</a></td>'  /!* '+product.name+' *!/
                        +'<td class="text-right">x '+productQty+'</td>'
                        + '<td class="text-right">' + parseInt(product.price_with_discount).toLocaleString() + 'تومان@ if ($product->has_discount) <span class=""><del style="color: crimson">' + parseInt(product.price).toLocaleString() + '</del></span> @ endif </td>'
                        + '<td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCart('+ product.id +')" type="button"><i class="fa fa-times"></i></button></td>'
                        + '</tr>'*/

                    '<tr id="cart-row'+product.id+'">'
                    // +'<td class="text-center"><a href="/productDetails/'+product.slug+'"> <img width="100" height="100" class="img-thumbnail" title="'+product.name+'" alt="'+product.name+'" src=""> </a> </td>'
                    +'<td class="text-center"><a href="/productDetails/'+product.slug+'"> <img width="100" height="100" class="img-thumbnail" title="'+product.name+'" alt="'+product.name+'" src="'+product.image_path+'"> </a> </td>'
                    +'<td class="text-left"> <a href="/productDetails/'+product.slug+'">'+product.name+'</a></td>'
                    +'<td class="text-right">x '+productQty+'</td>'
                    +'<td class="text-right">'+parseInt(product.price_with_discount).toLocaleString()+' تومان</td>'
                    +'<td class="text-center"> <button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCart('+product.id+')" type="button"> <i class="fa fa-times"></i></button></td>'
                    +'</tr>'

                    );

                    $('.cart-all-totalPrice').text(data.cart.total_price_all)  //جمع کل
                    $('.cart-totalPrice').text(data.cart.total_price)   //قابل پرداخت
                }

            }

        });

    }


    function removeFromCart(productId) {          //حذف محصول

        $.ajax({
            type: 'delete',
            url: '/card/' + productId,
            data: {
                _token: "{{ csrf_token() }}",
                productId: productId,
            },

            success: function (data) {
                $('#total_items').text(data.cart.total_items);              //quantity
                $('#total_price').text(data.cart.total_price);             //price
                $('#cart-row'+productId).remove();                       //remove(delete) html use JQuery
                $('#cart-index').remove();                              //remove (show) list index cart
                $('.cart-totalPrice').text(data.cart.total_price);          //delete price
                $('.cart-all-totalPrice').text(data.cart.total_price_all); //delete price all
            }

        });
    }



    function updateCart(productId) {            //اضافه کردن محصول

        let quantity = 1;   //page home low one quantity product حداقل یک محصول در نظر بگیره در صفحه اصلی که تعداد نداره

        if ($('#input-quantity' + productId).length) {     //if more 1 product go to quantity  |  $('#input-quantity').length > 1
            quantity = $('#input-quantity' + productId).val();    //value input-quantity
        }


        $.ajax({
            type: 'post',
            url: '/card/' + productId,
            data: {
                _token: "{{ csrf_token() }}",
                productId: productId,
                quantity: quantity,   //number product
            },

            success: function (data) {
                let product = data.cart[productId]['product'];   //به حالت جی کوئری بگیریم
                let productQty = data.cart[productId]['quantity'];

                $('#total_items').text(data.cart.total_items);  //quantity
                $('#total_price').text(data.cart.total_price);  //price
                $('.cart-all-totalPrice').text(data.cart.total_price_all)  //جمع کل
                $('.cart-totalPrice').text(data.cart.total_price)   //قابل پرداخت
                $('#totals-amount-' + productId).text(parseInt(product.price_with_discount * productQty).toLocaleString()) {{--تعداد محصول ضرب در قیمت تخفیفی یا عادی--}}
                $('#product-quantity-' + productId).text('x' + productQty)    /* تعداد محصول */
            }

        });
    }




</script>

@yield('scripts')
<!-- JS Part End-->

</body>
</html>
