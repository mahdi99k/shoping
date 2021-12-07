@extends('admin.layouts.app')

@section('title' , 'گروه مشخصات محصول')


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


                <p class="box__title">گروه مشخصات محصول</p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>عنوان</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $propertyGroup as $group)

                            <tr role="row" class="">
                                <td><a href="">{{ $group->id }}</a></td>
                                <td><a href="">{{ $group->title }}</a></td>
                                <td>
                                    <a href="{{ route('propertyGroup.edit' , [$group]) }}" class="item-edit " title="ویرایش"></a>
                                </td>

                                <td>
                                    <form action="{{ route('propertyGroup.destroy' , [ $group]) }}" method="post">
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
                                <td colspan="4" class="text-error" style="font-weight: bold">دیتایی درون جدول گروه مشخصات محصول وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{ $propertyGroup->links() }}

            </div>


            @include('admin.propertyGroup.create')      {{-- blade create --}}

        </div>
    </div>

@endsection
