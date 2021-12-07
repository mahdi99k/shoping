<div class="col-12 bg-white">
    <p class="box__title">ایجاد دسته بندی جدید</p>

    @includeIf('admin.partials._errors')

   {{--@includeIf('admin.partials.notification')--}}

    <form action="{{ route('category.store') }}" method="post" class="padding-30">
        @csrf
        <input type="text" value="{{ old('title_fa') }}" name="title_fa" placeholder="نام دسته بندی" class="text">
        <input type="text" value="{{ old('title_en') }}" name="title_en" placeholder="نام انگلیسی دسته بندی" class="text">
        <p class="box__title text-info margin-bottom-15">انتخاب دسته پدر</p>

        <select name="parent_id">
            <option value selected>دسته پدر ندارد</option>
            @foreach($selectCategory as $parent)
                <option value="{{ $parent->id }}">{{ $parent->title_fa }}</option>
            @endforeach
        </select>


        <div class="form-group">
            <p class="box__title text-info margin-bottom-15">انتخاب گروه مشخصات</p>

            {{-- <input type="radio" id="selectAll"/>فعال همه
            <input type="radio" id="disableAll" style="margin-right: 20px"/>غیر فعال همه  --}}

            <div class="row" style="margin: 10px 0">
                @forelse ($propertyGroup as $group)
                    <div class="padding-bottom-10" style="margin-right: 5px;">
                        <input type="checkbox" name="propertyGroup[]" class="checkedAll" value="{{ $group->id }}">  {{-- checkedAll فعال کردن همه یا برعکس --}}
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


        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
