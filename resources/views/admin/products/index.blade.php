@extends('admin.layouts.app')

@section('title' , 'محصولات')


@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">

                @if (session('delete'))
                    <div class="text-error text-center margin-bottom-10">{{ session('delete') }}</div>
                @endif

                @if (session('update'))
                    <div class="text-success text-center margin-bottom-10">{{ session('update') }}</div>
                @endif

                <p class="box__title">محصولات</p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>تصویر محصول</th>
                            <th>قیمت محصول</th>
                            <th>توضیحات محصول</th>
                            <th>دسته بندی محصول</th>
                            <th>برند محصول</th>
                            <th>تاریخ ایجاد</th>
                            <th>گالری</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $products as $product)

                            <tr role="row" class="">
                                <td><a href="">{{ $product->id }}</a></td>
                                <td><a href="">{{ \Illuminate\Support\Str::limit($product->name , 50) }}</a></td>
                                <td><img src="{{ asset('./' . str_replace('public/image-products/' , 'storage/image-products/'
                                         , $product->image)) }}" width="50" height="50" alt="brand"></td>

                                <td><a href="">{{ number_format($product->price) }}</a></td>  {{-- جدا کردن سه رقمی صفر با ویرگول --}}
                                <td><a href="">{{ \Illuminate\Support\Str::limit($product->description , 20) }}</a></td>
                                <td><a href="">{{ $product->category->title_fa }}</a></td>
                                <td><a href="">{{ $product->brand->name }}</a></td>
                                <td><a href="">{{ \Hekmatinasser\Verta\Verta::instance($product->created_at)->format('Y/n/j') }}</a></td>
                                {{--<td><a href="">{{ \Hekmatinasser\Verta\Verta::instance($product->created_at) }}</a></td>--}}
                                <td><a href="{{ route('product.gallery.index' , $product) }}" class="btnSuccess">نمایش</a></td>  {{-- slug --}}


                                <td>
                                    <a href="{{ route('product.edit' , ['id' => $product->id]) }}" class="item-edit " title="ویرایش"></a>  {{-- slug --}}
                                </td>

                                <td>
                                    <form action="{{ route('product.destroy' , ['id' => $product->id]) }}" method="post">  {{-- آیدی نمیخواد چون تو مادل محصول حالت روت اسلاگ --}}
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
                                <td colspan="9">دیتایی درون جدول محصولات وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{ $products->links() }}

            </div>


            @include('admin.products.create')      {{-- blade create --}}

        </div>
    </div>

@endsection
