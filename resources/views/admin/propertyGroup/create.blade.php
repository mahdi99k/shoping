<div class="col-4 bg-white">
    <p class="box__title">ایجاد گروه مشخصات محصول</p>

    @includeIf('admin.partials._errors')
    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('propertyGroup.store') }}" method="post" class="padding-30">
        @csrf
        <input type="text" value="{{ old('title') }}" name="title" placeholder="نام گروه مشخصات وارد نمایید" class="text">

        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>
