@extends('admin.layouts.app')

@section('title'){{ "دسته بندی ها" }}@endsection


@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
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
                                    <a href="{{ route('category.edit' , ['id' => $category->id]) }}" class="item-edit " title="ویرایش"></a>
                                </td>

                                <td>
                                    <form action="{{ route('category.destroy' , ['id' => $category->id]) }}" method="post">
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
                                <td colspan="5">دیتایی درون جدول دسته بندی ها وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div>


            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>

                @includeIf('admin.partials._errors')
                <form action="{{ route('category.store') }}" method="post" class="padding-30">
                    @csrf
                    <input type="text" name="title_fa" placeholder="نام دسته بندی" class="text">
                    <input type="text" name="title_en" placeholder="نام انگلیسی دسته بندی" class="text">
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

                    <select name="parent_id">
                        <option value selected>دسته پدر ندارد</option>
                        @foreach($categories as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->title_fa }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-brand">اضافه کردن</button>
                </form>
            </div>


        </div>
    </div>

@endsection
