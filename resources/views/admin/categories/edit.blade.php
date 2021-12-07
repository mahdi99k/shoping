@extends('admin.layouts.app')

@section('title' , 'ویرایش دسته بندی')



@section('content')

    <div class="col-8 bg-white" style="margin: 70px auto">
        <p class="box__title">ویرایش دسته بندی <b>{{ $category->title_fa }}</b></p>

        @includeIf('admin.partials._errors')
        <form action="{{ route('category.update' , $category->id) }}" method="post" class="padding-30">
            @csrf
            @method('patch')
            <input value="{{ $category->title_fa }}" type="text" name="title_fa" placeholder="ویرایش نام دسته بندی" class="text">
            <input value="{{ $category->title_en }}" type="text" name="title_en" placeholder="ویرایش نام انگلیسی دسته بندی" class="text">
            <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

            <select name="parent_id">
                <option value selected>دسته پدر ندارد</option>
                @foreach($categories as $parent)
                    <option @if ($parent->id === $category->parent_id)selected @endif
                        value="{{ $parent->id }}">{{ $parent->title_fa }}</option>
                @endforeach
            </select>


            <div class="form-group">
                <p class="box__title text-info margin-bottom-15">انتخاب گروه مشخصات</p>

                <div class="row" style="margin: 10px 0">
                    @forelse ($propertyGroup as $group)
                        <div class="padding-bottom-10" style="margin-right: 5px;">
                            <input @if ($category->hasPropertyGroup($group)) checked @endif type="checkbox"
                                   name="propertyGroup[]" class="checkedAll" value="{{ $group->id }}">  {{-- checkedAll فعال کردن همه یا برعکس --}}
                            <strong style="margin-left: 10px">{{ $group->title }}</strong>{{--propertyGroup[]به صورت آرایه--}}
                        </div>

                    @empty

                        <div class="padding-bottom-10" style="margin-right: 5px;">
                            <input type="checkbox" name="propertyGroup[]" class="checkedAll" value="">  {{-- checkedAll فعال کردن همه یا برعکس --}}
                            <strong class="text-error">مشخصاتی موجود نمی باشد</strong>{{--propertyGroup[]به صورت آرایه--}}
                        </div>

                    @endforelse
                </div>
            </div>


            <button class="btn btn-brand">به روزرسانی</button>
        </form>
    </div>

@endsection

