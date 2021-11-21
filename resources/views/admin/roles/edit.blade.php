@extends('admin.layouts.app')

@section('title' , 'ویرایش نقش')

@section('content')
    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title"> ویرایش نقش <b>{{ $role->title }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('role.update' , $role) }}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input type="text" value="{{ $role->title }}" name="title" placeholder="نام نقش وارد نمایید" class="text"/>


            <div class="form-group">
                <label class="text-info"><strong>انتخاب مجوز دسترسی:</strong></label>
                <div class="row" style="margin: 10px 0">
                    @foreach ($permissions as $permission)
                        <div class="padding-bottom-10" style="margin-right: 5px;">
                            <input @if ($role->hasPermission($permission)) checked @endif type="checkbox" name="permissions[]"
                                   value="{{ $permission->id }}"> <strong>{{ $permission->label }}</strong>{{--permissions[] آرایه--}}
                        </div>
                    @endforeach
                </div>
            </div>


            <button class="btn btn-brand">به روزسانی</button>
        </form>
    </div>

@endsection




