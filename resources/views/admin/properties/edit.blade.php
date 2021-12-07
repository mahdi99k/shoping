@extends('admin.layouts.app')

@section('title' , 'ویرایش زیر دسته گروه مشخصات محصول محصول')



@section('content')

    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title">ویرایش مشخصات محصول <b class="text-warning">{{ $property->title }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('properties.update' , $property) }}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{ $property->title }}" type="text" name="title" placeholder="ویرایش نام زیر دسته گروه مشخصات محصول محصول" class="text">

            <label for="brand">گروه مشخصات انتخاب نمایید:</label>
            <select name="property_group_id">
                <option value disabled selected>انتخاب کنید:</option>
                @foreach ($propertyGroup as $group)
                    <option @if($group->id === $property->property_group_id) selected @endif value="{{ $group->id }}">{{ $group->title }}</option>
                @endforeach
            </select>

            <button class="btn btn-brand">به روزرسانی</button>
        </form>
    </div>

@endsection

