@extends('admin.layouts.app')

@section('title' , 'دسته بندی ها')


@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters">

            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">

                @if (session('update'))
                    <div class="text-success text-center margin-bottom-10">{{ session('update') }}</div>
                @endif

                @if (session('delete'))
                    <div class="text-error text-center margin-bottom-10">{{ session('delete') }}</div>
                @endif


                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $categories as $category)

                            <tr role="row" class="">
                                <td><a href="">{{ $category->id }}</a></td>
                                <td><a href="">{{ $category->title_fa }}</a></td>
                                <td>{{ $category->title_en }}</td>
                                @if (!empty($category->parent->title_fa))
                                    <td style="color: #18ad00">{{ optional($category->parent)->title_fa }}</td>   {{-- optional خطا نمایش نده --}}
                                @else
                                    <td style="color: #20ae01"><b>دسته پدر</b></td>
                                @endif
                                <td>
                                    <a href="{{ route('category.edit' , ['id' => $category->id]) }}" class="item-edit "
                                       title="ویرایش"></a>
                                </td>

                                <td>
                                    <form action="{{ route('category.destroy' , ['id' => $category->id]) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="item-delete bg-white"
                                                style="cursor: pointer"></button>
                                        {{--<a href="" class="item-delete mlg-15" title="حذف"></a>--}}
                                    </form>
                                </td>

                            </tr>
                            {{--<a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>--}}

                        @empty
                            <tr>
                                <td colspan="5">دیتایی درون جدول دسته بندی ها وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{ $categories->links() }}

            </div>


            @include('admin.categories.create')      {{-- blade create --}}

        </div>
    </div>

@endsection
