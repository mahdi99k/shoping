@extends('admin.layouts.app')

@section('title' , 'ویرایش تخفیف')



@section('links')
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/jalalidatepicker.min.css') }}" />
@endsection


@section('content')
<div class="col-8 bg-white" style="margin: 30px auto">
    <p class="box__title"> ویرایش کد <b class="text-warning">{{ $offer->code }}</b></p>

    @includeIf('admin.partials._errors')
    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('offer.update' , $offer) }}" method="post" class="padding-30">
        @csrf
        @method('patch')
        <input type="text" value="{{ $offer->code }}" name="code" placeholder="کد تخفیف وارد نمایید" class="text">
        <input data-jdp type="text" value="{{ verta()->instance($offer->start_at)->format('Y/n/j') }}" name="start_at"
               placeholder="زمان شروع تخفیف وارد نمایید" autocomplete="false" class="text">
        <input data-jdp type="text" value="{{ verta()->instance($offer->end_at)->format('Y/m/d') }}" name="end_at"
               placeholder="زمان پایان تخفیف وارد نمایید" autocomplete="false" class="text">

        <button class="btn btn-brand">به روزرسانی</button>
    </form>
</div>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('admin/js/jalalidatepicker.min.js') }}"></script>

    <script>
        jalaliDatepicker.startWatch({

            separatorChar : "/" ,  //جداکننده بین سال، ماه و روز
            minDate : "attr",     //حداقل تاریخ
            maxDate	: "attr",    //حداکثر تاریخ
            changeMonthRotateYear : true,  //با تغییر ماه سال نیز کم یا زیاد شود
            showTodayBtn : true,          //نمایش دکمه امروز
            showEmptyBtn : true,         //نمایش دکمه پاکسازی

        })
        //flatpicker("[date-jdp]")
        document.getElementById("aaa").addEventListener("jdp:change" , function (e) { console.log(e) });

    </script>

@endsection


