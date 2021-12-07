@extends('admin.layouts.app')

@section('title' , 'ویرایش برند')

@section('content')
    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title"> ویرایش کامنت مربوط به محصول <b class="text-warning">{{ $comment->product->name }}</b></p>

        @includeIf('admin.partials._errors')
        @if (session('update'))
            <div class="text-success text-center margin-bottom-10">{{ session('update') }}</div>
        @endif
        <form action="{{ route('product.comments.update' , $comment) }}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input type="text" value="{{ $comment->user->name }}" name="name" placeholder="ویرایش نام کاربر وارد نمایید" class="text"/>
            <textarea name="comment" cols="30" rows="10">{{ $comment->comment }}</textarea>
            <h4 class="text-info">تایید یا عدم تایید کامنت</h4>
            <input type="radio" name="status_1" />تایید کامنت
            <input type="radio" name="status_0" style="margin-right: 15px;margin-top: 20px" />عدم تایید کامنت

            <button class="btn btn-brand">به روزسانی</button>
        </form>
    </div>

@endsection
