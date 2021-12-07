@extends('admin.layouts.app')

@section('title' , 'تخفیف ها')


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


                <p class="box__title">کد تخفیف</p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>کد تخفیف</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $offers as $offer)

                            <tr role="row" class="">
                                <td><a href="">{{ $offer->id }}</a></td>
                                <td><a href="">{{ $offer->code }}</a></td>
                                <td>{{ verta()->instance($offer->start_at)->format('Y/n/j') }}</td>
                                <td>{{ verta()->instance($offer->end_at)->format('Y/m/d') }}</td>

                                <td>
                                    <a href="{{ route('offer.edit' , [ $offer ]) }}" class="item-edit " title="ویرایش"></a>
                                </td>

                                <td>
                                    <form action="{{ route('offer.destroy' , [ $offer ]) }}" method="post">
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
                                <td colspan="5" class="text-error" style="font-weight: bold">دیتایی درون جدول تخفیف ها وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{--{{ $offers->links() }}--}}

            </div>


            @include('admin.offers.create')      {{-- blade create --}}

        </div>
    </div>

@endsection
