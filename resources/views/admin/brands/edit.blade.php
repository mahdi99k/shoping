@extends('admin.layouts.app')

@section('title' , 'ویرایش برند')

@section('content')
    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title"> ویرایش برند <b>{{ $brand->name }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('brands.update' , $brand->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="text" value="{{ $brand->name }}" name="name" placeholder="نام برند وارد نمایید" class="text"/>
            <label for="image">افزودن عکس</label>
            <input type="file" name="image" id="image" class="text"/>
            <div style="text-align: center">
           <img src="{{ asset('./' . str_replace('public/image-brands/' , 'storage/image-brands/' , $brand->image)) }}"
                width="90" height="90" alt="{{ $brand->name }}">
            </div>

            <button class="btn btn-brand">به روزسانی</button>
        </form>
    </div>

@endsection




