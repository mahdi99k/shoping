@extends('admin.layouts.app')

@section('title' , 'کامنت محصول')


@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3" style="margin: auto">

                @if (session('delete'))
                    <div class="text-error text-center margin-bottom-10">{{ session('delete') }}</div>
                @endif

                @if (session('update'))
                    <div class="text-success text-center margin-bottom-10">{{ session('update') }}</div>
                @endif

                <p class="box__title"> کامنت های مزبوط به محصول <b class="text-warning">{{ $product->name }}</b></p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>متن نظر</th>
                            <th>تایید کامنت</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $product->comments as $comment)

                            <tr role="row" class="">
                                <td><a href="">{{ $comment->id }}</a></td>
                                <td><a href="">{{ $comment->user->name }}</a></td>
                                <td style=" font-size: 12px;"><a href="{{ route('product.comments.show' , [ $product->slug , $comment]) }}" class="btnWarning">نمایش کامنت</a></td>

                                <td>
                                    {{--<a href="{{ route('product.comments.edit' , $comment) }}" class="item-edit " title="ویرایش"></a>--}}
                                    @if ($comment->status === '0')

                                        <form action="{{ route('product.comments.update' , $comment) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="submit" value="تایید" class="btn btnPrimary">
                                        </form>

                                    @else
                                        <p class="text-success textBold">تایید شده</p>
                                    @endif

                                </td>

                                <td>
                                    <form action="{{ route('product.comments.destroy' , [$comment]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="item-delete bg-white" style="cursor: pointer"></button>
                                        {{--<a href="" class="item-delete mlg-15" title="حذف"></a>--}}
                                    </form>
                                </td>

                            </tr>
                            {{--<a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>--}}

                        @empty
                            <tr>
                                <td colspan="5" class="text-error" style="font-weight: bold">دیتایی درون جدول کامنت محصول وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{--{{ $product->links() }}--}}

            </div>

            {{--@include('admin.brands.create')--}}

        </div>
    </div>

@endsection
