@section('links')
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/css/jalalidatepicker.min.css') }}" />
@endsection


<div class="col-4 bg-white">
    <p class="box__title">ایجاد کد تخفیف جدید</p>

    @includeIf('admin.partials._errors')
    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('offer.store') }}" method="post" class="padding-30">
        @csrf
        <input type="text" value="{{ old('code') }}" name="code" placeholder="کد تخفیف وارد نمایید" class="text">
        <input data-jdp type="text" value="{{ old('start_at') }}" name="start_at" placeholder="زمان شروع تخفیف وارد نمایید" autocomplete="false" class="text">
        <input data-jdp type="text" value="{{ old('end_at') }}" name="end_at" placeholder="زمان پایان تخفیف وارد نمایید" autocomplete="false" class="text">

        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>


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
