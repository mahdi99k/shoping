@extends('admin.layouts.app')

@section('title' , 'اسلایدر ها')


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

                <p class="box__title">اسلایدر ها</p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>لینک</th>
                            <th>تصویر</th>
                            <th>نام تصویر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $sliders as $slider)

                            <tr role="row" class="">
                                <td><a href="">{{ $slider->id }}</a></td>
                                <td><a href="">{{ \Illuminate\Support\Str::limit($slider->link , 40) }}</a></td>
                                <td><img src="{{ asset('./' . str_replace('public/image-sliders/' , 'storage/image-sliders/' , $slider->image)) }}"
                                         width="90" height="55" alt="img"></td>


                                <td>{{ $slider->alt }}</td>


                                <td>
                                    <a href="{{ route('slider.edit' , [$slider]) }}" class="item-edit " title="ویرایش"></a>
                                </td>

                                <td>
                                    <form action="{{ route('slider.destroy' , [$slider]) }}" method="post">
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
                                <td colspan="6" class="text-error" style="font-weight: bold">دیتایی درون جدول اسلایدر ها وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{--{{ $sliders->links() }}--}}

            </div>


            @include('admin.sliders.create')      {{-- blade create --}}

        </div>
    </div>

@endsection
