@extends('admin.layouts.app')

@section('title' , 'نمایش کامنت')

@section('content')
    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title"> نمایش کامنت مربوط به محصول <b class="text-warning">{{ $product->name }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="" method="post" class="padding-30">
            @csrf

            @foreach ($product->comments as $comment)
                <label for="comment">نمایش کامنت کاربر :</label>
                <textarea type="text" name="comment" id="comment" class="text" style="resize: none">{{ $comment->comment }}</textarea>
            @endforeach

            <a href="{{ route('product.comments.index' ,  $product) }}" class="btn btnPrimary">برگشت به صفحه قبل</a>
        </form>
    </div>

@endsection




