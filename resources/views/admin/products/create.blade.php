<div class="col-4 bg-white">
    <p class="box__title">ایجاد محصول جدید</p>

    @includeIf('admin.partials._errors')

    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('product.store') }}" method="post" class="padding-30" enctype="multipart/form-data">
        @csrf
        <input type="text" value="{{ old('name') }}" name="name" placeholder="نام محصول وارد نمایید" class="text"/>

        <label for="category">افزودن دسته بندی محصول:</label>
        <select name="category_id">
            <option value disabled selected>انتخاب کنید:</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title_fa }}</option>
            @endforeach
        </select>

        <label for="brand">افزودن دسته بندی برند:</label>
        <select name="brand_id">
            <option value disabled selected>انتخاب کنید:</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <input type="number" value="{{ old('price') }}" name="price" placeholder="قیمت محصول وارد نمایید" class="text"/>

        <input type="text" value="{{ old('slug') }}" name="slug" placeholder="اسلاگ محصول وارد نمایید" class="text"/>

        <textarea name="description" cols="30" rows="10" placeholder="توضیحات محصول وارد نمایید" style="height: 150px!important;">{{ old('description') }}</textarea>

        <label for="image">افزودن تصویر محصول:</label>
        <input type="file" name="image" id="image" class="text"/>


        <button class="btn btn-brand">اضافه کردن</button>
    </form>
</div>

{{--<p>

    پیراهن مردانه x-l با رنگ آبی مناسب برای آقایان خوش سلیقه در طرح ها و رنگ های بسیار زیبا مخصوص  شما که به تیپ و چهره خود اهمیت می دهید.
    ارسال فوری

</p>--}}



