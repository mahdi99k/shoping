@extends('admin.layouts.app')

@section('title' , 'ویرایش اسلایدر')

@section('content')
    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title">ویرایش اسلایدر</p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('slider.update' , $slider) }}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="text" value="{{ $slider->link }}" name="link" placeholder="ویرایش لینک اسلایدر وارد نمایید" class="text"/>
            <label for="image">افزودن عکس</label>
            <input type="file" name="image" id="image" class="text"/>
            <div style="text-align: center">
                <img src="{{ asset('./' . str_replace('public/image-sliders/' , 'storage/image-sliders/' , $slider->image)) }}"
                     width="120" height="90" alt="{{ $slider->alt }}">
            </div>
            <input type="text" value="{{ $slider->alt }}" name="alt" placeholder="ویرایش نام تصویر اسلایدر وارد نمایید" class="text" />

            <button class="btn btn-brand">به روزسانی</button>
        </form>
    </div>

@endsection




