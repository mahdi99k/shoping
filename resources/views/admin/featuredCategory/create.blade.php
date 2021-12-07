@extends('admin.layouts.app')

@section('title' , 'دسته بندی ویژه')


@section('content')

    <div class="col-10 bg-white"  style="margin: 30px auto">
        <p class="box__title">ایجاد دسته بندی ویژه</p>

        @includeIf('admin.partials._errors')
        @if (session('success'))
            <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
        @endif

        <form action="{{ route('featuredCategory.store') }}" method="post" class="padding-30">
            @csrf
            <p class="box__title text-info margin-bottom-15">انتخاب دسته ویژه</p>

            <select name="parent_id">
                <option disabled value>... انتخاب دسته ویژه ...</option>
                @foreach($categories as $parent)
                    <option @if ($parent->id === $featured_category->category_id) selected @endif value="{{ $parent->id }}">{{ $parent->title_fa }}</option>
                @endforeach
            </select>


            <button class="btn btn-brand">اضافه کردن</button>
        </form>
    </div>


@endsection



