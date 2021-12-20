<header class="header-row">
    <div class="container">
        <div class="table-container">
            <!-- Logo Start -->
            <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                <div id="logo"><a href="index.html">
                        <img class="img-responsive" src="/client/image/logo.png" title="MarketShop" alt="MarketShop"/>
                    </a></div>
            </div>
            <!-- Logo End -->


            <!-- Mini Cart Start-->
            <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div id="cart">
                    <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..."
                            class="heading dropdown-toggle">
                        <span class="cart-icon pull-left flip"></span>
                        <span id="cart-total">

                            {{--اگر سشن کارت داشت بیا قیمت و تعداد محصول بگیر--}}
                            <span
                                id="total_items">@if(\App\Models\Card::getItems()) {{\App\Models\Card::totalItems()}} @else
                                    0 @endif</span> محصول -<span id="total_price">
                            @if(\App\Models\Card::getItems()) {{ number_format(\App\Models\Card::totalPrice()) }} @else
                                    0 @endif</span> تومان</span></button>


                    @include('client.layouts.childHeader.mini-cart')   {{-- cart menu --}}
                </div>
            </div>
            <!-- Mini Cart End-->

            <!-- جستجو Start-->
            <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                <div id="search" class="input-group">
                    <input id="filter_search" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg"/>
                    <button type="button" class="button-search"><i class="fa fa-search"></i></button>

                    <table class="list-group-item list-group-item-action">
                        <tbody>
                        <!--  after search show data  -->
                        </tbody>
                    </table>
                    <div class="table-responsive">
                        <h6 class="text-center" style="color: whitesmoke"> تعداد محصول پیدا شده : <span id="total_products"></span></h6>
                    </div>

                </div>
            </div>
            <!-- جستجو End-->

        </div>
    </div>
</header>


@section('scripts')
    <script>

        function fetchCustomerData(value = '') {
            $.ajax({
                url: '/product/search',
                method: 'post',
                dataType: 'json',
                data: {
                    value: value,  //value search
                    _token: '{{csrf_token()}}'
                }, success: function (data) {
                    $('tbody').html(data.table_data);                //search product
                    $('#total_products').text(data.total_products);  //count product
                }
            })
        }

        $('#filter_search').on('keyup', function () {   //id input search
            let query = $(this).val();
            fetchCustomerData(query);
        })


    </script>
@endsection
