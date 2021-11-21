@extends('admin.layouts.app')

@section('title' , 'ویرایش تخفیف ها')



@section('content')

    <div class="col-6 bg-white" style="margin: 30px auto">
        <p class="box__title">ویرایش تخفیف برای محصول <b class="text-warning">{{ $product->name }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('product.discount.update' , ['product' => $product , 'discount' => $discount]) }}" method="post" class="padding-30"> {{-- slug --}}
            @csrf
            @method('patch')
            <input type="number" value="{{ $discount->value }}" name="value" class="text"/>

            <button class="btn btn-brand">به روزرسانی</button>
        </form>
    </div>

@endsection
