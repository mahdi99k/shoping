@extends('admin.layouts.app')

@section('title' , 'کاربران')


@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters">
            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">

                @if (session('delete'))
                    <div class="text-error text-center margin-bottom-10">{{ session('delete') }}</div>
                @endif

                @if (session('update'))
                    <div class="text-success text-center margin-bottom-10">{{ session('update') }}</div>
                @endif

                <p class="box__title">کاربران</p>
                <div class="table__box">
                    <table class="table">

                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>#</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>نقش</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse ( $users as $user)

                            <tr role="row" class="">
                                <td><a href="">{{ $user->id }}</a></td>
                                <td><a href="">{{ $user->name }}</a></td>
                                <td><a href="">{{ $user->email }}</a></td>
                                <td><a href="">{{ $user->role->title }}</a></td>
                                <td>
                                    <a href="{{ route('user.edit' , ['id' => $user->id]) }}" class="item-edit " title="ویرایش"></a>
                                </td>

                                <td>
                                    <form action="{{ route('user.destroy' , ['id' => $user->id]) }}" method="post">
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
                                <td colspan="4">دیتایی درون جدول کاربران وجود ندارد</td>
                            </tr>

                        @endforelse
                        </tbody>

                    </table>
                </div>

                {{ $users->links() }}

            </div>


            @include('admin.users.create')      {{-- blade create --}}

        </div>
    </div>

@endsection
