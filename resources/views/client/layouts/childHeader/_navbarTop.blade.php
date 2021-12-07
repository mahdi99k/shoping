<nav id="top" class="htop">
    <div class="container">
        <div class="row"><span class="drop-icon visible-sm visible-xs"><i
                    class="fa fa-align-justify"></i></span>
            <div class="pull-left flip left-top">
                <div class="links">
                    <ul>
                        <li class="mobile"><i class="fa fa-phone"></i>+21 9898777656</li>
                        <li class="email"><a href="mailto:info@marketshop.com"><i class="fa fa-envelope"></i>info@marketshop.com</a></li>

                        @auth
                            <li class="wrap_custom_block">
                                {{--  {{ auth()->user()->name }}   |  {{ auth()->user()->likes->count() }}  --}}
                                <a href="{{ route('client.likes.wishList.index') }}" target="_blank">لیست علاقه مندی ها(
                                    <span id="likes_count">{{ auth()->user()->likes->count() }}</span>)<b></b></a>
                        @endauth

                        <li class="wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی<b></b></a>
                            <div class="dropdown-menu custom_block">
                                <ul>
                                    <li>
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td><img alt="" src="/client/image/banner/cms-block.jpg"></td>
                                                <td><img alt="" src="/client/image/banner/responsive.jpg"></td>
                                            </tr>
                                            <tr>
                                                <td><h4>بلاک های محتوا</h4></td>
                                                <td><h4>قالب واکنش گرا</h4></td>
                                            </tr>
                                            <tr>
                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html
                                                    نوشتاری یا تصویری را در آن قرار دهید.
                                                </td>
                                                <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html
                                                    نوشتاری یا تصویری را در آن قرار دهید.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                                                <td><strong><a class="btn btn-default btn-sm" href="#">ادامه مطلب</a></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="language" class="btn-group">
                    <button class="btn-link dropdown-toggle" data-toggle="dropdown"><span>
                                    <img src="/client/image/flags/gb.png" alt="انگلیسی" title="انگلیسی">انگلیسی <i
                                class="fa fa-caret-down"></i></span></button>
                    <ul class="dropdown-menu">
                        <li>
                            <button class="btn btn-link btn-block language-select" type="button" name="GB"><img
                                    src="/client/image/flags/gb.png" alt="انگلیسی" title="انگلیسی"/> انگلیسی
                            </button>
                        </li>
                        <li>
                            <button class="btn btn-link btn-block language-select" type="button" name="GB"><img
                                    src="/client/image/flags/ar.png" alt="عربی" title="عربی"/> عربی
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="currency" class="btn-group">
                    <button class="btn-link dropdown-toggle" data-toggle="dropdown"><span> تومان <i class="fa fa-caret-down"></i></span></button>

                    <ul class="dropdown-menu">
                        <li>
                            <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                        </li>
                        <li>
                            <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                        </li>
                        <li>
                            <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ USD</button>
                        </li>
                    </ul>

                </div>
            </div>
            <div id="top-links" class="nav pull-right flip">

                @auth

                    <form action="{{ route('client.logout') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" name="logout" value="خروج" class="btn btn-danger"/>
                    </form>

                @else {{--  @guest() مهمان  --}}

                <ul>
                    <li><a href="{{ route('client.register') }}" target="_blank">ورود | ثبت نام</a></li>
                </ul>

                @endauth

            </div>
        </div>
    </div>
</nav>
