@extends('admin.layouts.app')

@section('title' , 'تخفیف ها')



@section('content')

    <div class="col-6 bg-white" style="margin: 30px auto">
        <p class="box__title">ایجاد تخفیف برای محصول <b class="text-warning">{{ $product->name }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('product.discount.store' , $product) }}" method="post" class="padding-30"> {{-- slug --}}
            @csrf
            <input type="number" value="{{ old('value') }}" name="value" placeholder="مقدار تخفیف وارد نمایید" class="text"/>

            <button class="btn btn-brand">اضافه کردن</button>
        </form>
    </div>

@endsection
