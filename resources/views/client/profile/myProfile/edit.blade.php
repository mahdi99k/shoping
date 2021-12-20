@extends('client.layouts.app')

@section('titleWeb' , 'پروفایل کاربری')


@section('content')

    <div class="container">

        <!-- Breadcrumb Start-->
            @include('client.composer.breadcrumbLoginRegister')
        <!-- Breadcrumb End-->


        <div class="row">
            <!--Middle Part Start-->
            <h2 class="title text-center"> کاربر گرامی <span class="text-warning">{{ auth()->user()->name }}</span> به پنل کاربری خود خوش آمدید </h2>

            <div class="col-sm-9" id="content">
                @include('client.composer.myProfile')

                <form class="form-horizontal" method="post" action="{{ route('client.myProfile.update') }}">
                    @csrf
                    @method('patch')
                    <fieldset id="account" style="margin-bottom: 20px;margin-top: 50px">
                        <legend>ویرایش اطلاعات کاربری</legend>
                        @include('admin.partials._errors')

                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2">آدرس ایمل :</label>
                            <div class="col-sm-8">
                                {{--  readonly  اینپوت غیر فعال میکنه  --}}
                                <input readonly type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" id="input-email"
                                       placeholder="لطفا آدرس ایمیل خود را وارد نمایید" style="border-radius: 3px" />
                            </div>
                        </div>


                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2">نام :</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" id="input-email" placeholder="نام کاربر" style="border-radius: 3px" />
                            </div>
                        </div>

                    </fieldset>

                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-success" value="به روزرسانی" style="border-radius: 3px">
                            <a href="{{ route('client.myProfile.changePassword.edit') }}" type="submit" class="btn btn-primary" style="border-radius: 3px;margin-right: 15px">تغییر رمز عبور</a>
                        </div>
                    </div>

                </form>

            </div>
            <!--Middle Part End -->


            <!--Right Part Start -->
            <aside id="column-right" class="col-sm-3 hidden-xs">
                <h3 class="subtitle">حساب کاربری</h3>
                <div class="list-group">
                    <ul class="list-item">
                        <li><a href="{{ route('client.login.create') }}" target="_blank">ورود</a></li>
                        <li><a href="{{ route('client.register') }}" target="_blank">ثبت نام</a></li>
                        <li><a href="#">فراموشی رمز عبور</a></li>
                        <li><a href="#">حساب کاربری</a></li>
                        <li><a href="wishlist.html">لیست علاقه مندی</a></li>
                        <li><a href="#">تاریخچه سفارشات</a></li>
                        <li><a href="#">دانلود ها</a></li>
                        <li><a href="#">امتیازات خرید</a></li>
                        <li><a href="#">بازگشت</a></li>
                    </ul>
                </div>
            </aside>
            <!--Right Part End -->

        </div>
    </div>


@endsection







