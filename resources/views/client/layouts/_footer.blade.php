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

    function likeProduct(productId) {
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


    function addToCart(productId) {

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

        });

    }


</script>

@yield('scripts')
<!-- JS Part End-->

</body>
</html>
