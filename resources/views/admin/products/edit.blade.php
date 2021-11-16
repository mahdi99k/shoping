@extends('admin.layouts.app')

@section('title' , 'ویرایش محصول')



@section('content')

    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title">ویرایش محصول <b>{{ $product->name }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('product.update' , $product->id) }}" method="post" class="padding-30" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="text" value="{{ $product->name }}" name="name" placeholder="نام محصول وارد نمایید" class="text"/>

            <label for="category">ویرایش دسته بندی محصول:</label>
            <select name="category_id">
                <option value disabled selected>انتخاب کنید:</option>
                @foreach ($categories as $category)
                    <option @if($category->id === $product->category_id) selected @endif value="{{ $category->id }}">{{ $category->title_fa }}</option>
                @endforeach
            </select>

            <label for="brand">ویرایش دسته بندی برند:</label>
            <select name="brand_id">
                <option value disabled selected>انتخاب کنید:</option>
                @foreach ($brands as $brand)
                    <option @if($brand->id === $product->brand_id) selected  @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>

            <input type="number" value="{{ $product->price }}" name="price" placeholder="قیمت محصول وارد نمایید" class="text"/>

            <input type="text" value="{{ $product->slug }}" name="slug" placeholder="اسلاگ محصول وارد نمایید" class="text"/>

            <textarea name="description" cols="30" rows="10" placeholder="توضیحات محصول وارد نمایید" style="height: 150px!important;">{{ $product->description }}</textarea>

            <label for="image">ویرایش تصویر محصول:</label>
            <input type="file" name="image" id="image" class="text"/>
            <div class="text-center">
                <img src="{{ asset('./' . str_replace('public/image-products' , 'storage/image-products' , $product->image)) }}"
                     width="90" height="90" alt="{{ $product->name }}">
            </div>

            <button class="btn btn-brand">به روزرسانی</button>
        </form>
    </div>

@endsection

