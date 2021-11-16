@extends('admin.layouts.app')

@section('title' , 'برند ها')


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

                <p class="box__title">برند ها</p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام برند</th>
                            <th>عکس</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $brands as $brand)

                            <tr role="row" class="">
                                <td><a href="">{{ $brand->id }}</a></td>
                                <td><a href="">{{ $brand->name }}</a></td>
                                <td><img src="{{ asset('./' . str_replace('public/image-brands/' , 'storage/image-brands/'
                                         , $brand->image)) }}" width="50" height="50" alt="brand"></td>
                                <td>
                                    <a href="{{ route('brands.edit' , ['id' => $brand->id]) }}" class="item-edit " title="ویرایش"></a>
                                </td>

                                <td>
                                    <form action="{{ route('brands.destroy' , ['id' => $brand->id]) }}" method="post">
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
                                <td colspan="5">دیتایی درون جدول برند ها وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{ $brands->links() }}

            </div>


            @include('admin.brands.create')      {{-- blade create --}}

        </div>
    </div>

@endsection
