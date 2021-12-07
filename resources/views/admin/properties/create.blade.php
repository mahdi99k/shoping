<div class="col-4 bg-white">
    <p class="box__title">ایجاد زیر دسته گروه مشخصات محصول محصول</p>

    @includeIf('admin.partials._errors')
    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('properties.store') }}" method="post" class="padding-30">
        @csrf
        <input type="text" value="{{ old('title') }}" name="title" placeholder="نام زیر دسته گروه مشخصات محصول" class="text">

        <label for="brand">گروه مشخصات انتخاب نمایید:</label>
        <select name="property_group_id">
            <option value disabled selected>انتخاب کنید:</option>
            @foreach ($propertyGroup as $group)
                <option value="{{ $group->id }}">{{ $group->title }}</option>
            @endforeach
        </select>

        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
