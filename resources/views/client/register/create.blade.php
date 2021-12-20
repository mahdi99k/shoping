@extends('client.layouts.app')

@section('titleWeb' , ' ثبت نام | ورود ')


@section('content')

    <div class="container">

        <!-- Breadcrumb Start-->
    @include('client.composer.breadcrumbLoginRegister')
        <!-- Breadcrumb End-->


        <div class="row">
            <!--Middle Part Start-->
            <div class="col-sm-9" id="content">
                <h1 class="title">ثبت نام حساب کاربری</h1>
                <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{ route('client.login.create') }}">صفحه لاگین</a> مراجعه کنید.</p>


                <form class="form-horizontal" method="post" action="{{ route('client.register.sendmail') }}">
                    @csrf
                    <fieldset id="account" style="margin-bottom: 20px;margin-top: 50px">
                        <legend>برای ارسال کد تایید ایمیل خود را وارد نمایید</legend>
                        @include('admin.partials._errors')

                        <div class="form-group required">
                            <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" id="input-email"
                                       placeholder="آدرس ایمیل خود را جهت تایید رمز به ایملتان وارد نمایید" style="border-radius: 3px" />
                            </div>
                        </div>
                    </fieldset>

                    <div class="buttons">
                        <div class="pull-right">
                            <input type="submit" class="btn btn-primary" value="ارسال" style="border-radius: 3px;margin-left: 8px">
                            <a href="{{ route('client.login.google') }}" class="btn btn-success fa fa-google">ثبت نام با حساب گوگل</a>

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







