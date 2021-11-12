<div class="col-4 bg-white">
    <p class="box__title">ایجاد دسته بندی جدید</p>

    @includeIf('admin.partials._errors')
    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('category.store') }}" method="post" class="padding-30">
        @csrf
        <input type="text" value="{{ old('title_fa') }}" name="title_fa" placeholder="نام دسته بندی" class="text">
        <input type="text" value="{{ old('title_en') }}" name="title_en" placeholder="نام انگلیسی دسته بندی" class="text">
        <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>

        <select name="parent_id">
            <option value selected>دسته پدر ندارد</option>
            @foreach($selectCategory as $parent)
                <option value="{{ $parent->id }}">{{ $parent->title_fa }}</option>
            @endforeach
        </select>

        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
