@extends('admin.layouts.app')

@section('title' , 'گالری')

@section('links')
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
@endsection



@section('content')

    <div class="main-content padding-0 categories">
        <div class="row no-gutters">

            <div class="col-12 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">ایجاد گالری برای <b class="text-warning">{{ $product->name }}</b></p>
                <div class="table__box">

                    <form action="{{ route('product.gallery.store' , $product) }}" method="post" class="dropzone" {{-- slug --}}
                          id="my-awesome-dropzone" style="border-radius: 5px">
                        @csrf
                        <div class="fallback">
                            <input type="file" name="file" multiple/>
                        </div>
                    </form>

                </div>

                @if ($product->galleies->count() > 0)
                    <p class="box__title text-center"> نمایش تصاویر گالری  | این محصول دارای <b class="text-info">{{ $product->galleies->count() }}</b> تصویر می باشد  </p>

                @else
                    <p class="box__title text-center"> نمایش تصاویر گالری  | این محصول دارای <b class="text-info">1</b> تصویر می باشد  </p>
                @endif

                @if (session('delete'))
                    <div class="text-error text-center" style="margin-top: 10px">{{ session('delete') }}</div>
                @endif

            </div>

            {{------------- create Gallery start -------------}}


            <div class="col-12 d-flex-me box__title bg-white">
                @forelse ($product->galleies as $gallery)

                    <div class="card">
                        <img  src="{{ str_replace('public/productGallery/' , '/storage/productGallery/' , $gallery->path) }}"
                            width="100" height="100" alt="{{ $gallery->product->name }}" style="margin-bottom: 50px"/>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('product.gallery.destroy' , ['product' => $product , 'gallery'  => $gallery]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="item-delete" style="color: red;font-weight: bold;cursor: pointer">حذف تصویر</button>
                        </form>
                    </div>

                @empty
                    <div class="card">
                        <img src="{{ asset('storage/image-products/samsung-S20.jpg') }}" width="300" height="350"
                             alt="samsung"/>
                    </div>

                    <div class="card-body">
                        <button type="submit" class="item-delete" style="color: red;font-weight: bold;cursor: pointer">حذف تصویر</button>
                        {{--<a href="" class="btnDanger">حذف</a>--}}
                    </div>
                @endforelse
            </div>


            {{------------- create Gallery end -------------}}
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('admin/js/dropzone.js') }}"></script>
@endsection





{{--
<form action="" class="padding-30">
    <div class="file-upload">
        <div class="i-file-upload">
            <span>آپلود درس</span>
            <input type="file" class="file-upload" name="files"/>
        </div>
        <span class="filesize"></span>
        <span class="selectedFiles">فایلی انتخاب نشده است</span>
    </div>

    <button class="btn btn-brand">آپلود گالری</button>
</form> --}}


{{--
<div class="main-content padding-0">
    <p class="box__title">ایجاد گالری برای <b class="text-warning">{{ $product->name }}</b> </p>
    <div class="row no-gutters bg-white">
        <div class="col-12">

            <form action="{{ route('product.gallery.store' , $product->id) }}" method="post" class="dropzone" id="my-awesome-dropzone" style="border-radius: 5px">
                @csrf
                <div class="fallback">
                    <input type="file" name="file" multiple />
                </div>
            </form>

            <button class="btn btn-brand" style="margin-top: 20px">آپلود گالری</button>

        </div>
    </div>
</div>  --}}
