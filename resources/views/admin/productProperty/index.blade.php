@extends('admin.layouts.app')

@section('title' , 'ویژگی های محصول')


@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3"  style="margin: 30px auto">

                @if (session('delete'))<div class="text-error text-center margin-bottom-10">{{ session('delete') }}</div>@endif
                @if (session('update'))<div class="text-success text-center margin-bottom-10">{{ session('update') }}</div>@endif

                <p class="box__title"> ویژگی های محصول <b>{{ $product->name }}</b>
                    <a href="{{ route('product.properties.create' , $product) }}" class="btn btnSuccess">افزودن ویژگی جدید</a>
                </p>

                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>گروه مشخصات</th>
                            <th>مشخصات</th>
                            <th>مقدار</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $product->properties as $property)

                            <tr role="row" class="">
                                <td><a href="">{{ $property->id }}</a></td>
                                <td><a href="">{{ $property->propertyGroup->title }}</a></td>
                                <td><a href="">{{ $property->title }}</a></td>
                                <td><a href="">{{ $property->pivot->value }}</a></td>

                            </tr>
                            {{--<a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>--}}

                        @empty
                            <tr>
                                <td colspan="4" class="text-error" style="font-weight: bold">دیتایی درون جدول ویژگی های محصول وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>

                </div>

                {{--{{ $product->properties->links() }}--}}

            </div>


            {{--@include('admin.brands.create')--}}      {{-- blade create --}}

        </div>
    </div>

@endsection
