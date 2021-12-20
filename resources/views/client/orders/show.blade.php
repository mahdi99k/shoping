@extends('client.layouts.app')

@section('titleWeb' , 'نمایش پیام درگاه پرداخت')


@section('content')

    @if ($order->payment_status === 'OK')

        <h2 class="alert alert-success text-center">پرداخت با موفقیت انجام شد</h2>
    @else

        <h2 class="alert alert-danger text-center">پرداخت با مشکل رو به رو شد</h2>
    @endif

@endsection
