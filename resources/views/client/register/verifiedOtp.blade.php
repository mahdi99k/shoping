@extends('client.layouts.app')

@section('title' , 'ثبت نام | ورود')


@section('content')

    <div class="container">

        <!-- Breadcrumb Start-->
        <ul class="breadcrumb" style="margin-top: 5px">
            <li><a href="index.html" style="font-size: 15px;color: royalblue"><i class="fa fa-home"></i></a></li>
            <li><a href="login.html" style="font-size: 15px;color: royalblue">حساب کاربری</a></li>
            <li><a href="register.html" style="font-size: 15px;color: royalblue">ثبت نام</a></li>
        </ul>
        <!-- Breadcrumb End-->


        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h1 class="title">تایید حساب کاربری</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>


                <form class="form-horizontal" method="post" action="{{ route('client.register.verifiedOtp' , $user) }}">
                    @csrf
                    <fieldset id="account" style="margin-bottom: 20px;margin-top: 50px">
                        <legend>کد ارسال شده به ایمیل خود را وارد نمایید</legend>
                        @if (session('errorVerified'))
                            <div class="text-danger margin-bottom-10">{{ session('errorVerified') }}</div>
                        @endif
                        @include('admin.partials._errors')

                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">کد تایید </label>
                            <div class="col-sm-8">
                                <input type="text" name="otp" minlength="5" maxlength="5" min="11111" max="99999" class="form-control"
                                       id="input-email" placeholder="کد تایید را وارد نمایید"  style="border-radius: 3px"  />
                            </div>
                        </div>
                    </fieldset>

                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-primary" value="تایید حساب کاربری" style="border-radius: 3px">
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
                        <li><a href="login.html">ورود</a></li>
                        <li><a href="register.html">ثبت نام</a></li>
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







