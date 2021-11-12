<div class="col-4 bg-white">
    <p class="box__title">ایجاد برند جدید</p>

    @includeIf('admin.partials._errors')

    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('brands.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <input type="text" value="{{ old('name') }}" name="name" placeholder="نام برند وارد نمایید" class="text"/>
        <label for="image">افزودن عکس</label>
        <input type="file" name="image" id="image" class="text"/>

        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>



