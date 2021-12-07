@extends('admin.layouts.app')

@section('title' , 'ویرایش کاربر')

@section('content')
    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title"> ویرایش کاربر <b>{{ $user->name }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('user.update' , $user) }}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input type="text" value="{{ $user->name }}" name="name" placeholder="ویرایش نام کاربر وارد نمایید" class="text"/>

            <input type="email" value="{{ $user->email }}" name="email" placeholder="ویرایش ایمیل کاربر وارد نمایید" class="text"/>

            <label>انتخاب نقش کاربر:</label>
            <select name="role_id">
                <option value="0" disabled>انتخاب نقش کاربر:</option>
                @foreach ($roles as $role)
                    <option @if($role->id === $user->role_id) selected @endif value="{{ $role->id }}">{{ $role->title }}</option>
                @endforeach
            </select>


            <button class="btn btn-brand">به روزسانی</button>
        </form>
    </div>

@endsection




