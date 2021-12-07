@extends('admin.layouts.app')

@section('title' , 'ویرایش گروه مشخصات محصول')



@section('content')

    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title">ویرایش مشخصات محصول <b class="text-warning">{{ $property->title }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('propertyGroup.update' , $property) }}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{ $property->title }}" type="text" name="title" placeholder="ویرایش نام گروه مشخصات محصول" class="text">

            <button class="btn btn-brand">به روزرسانی</button>
        </form>
    </div>

@endsection

