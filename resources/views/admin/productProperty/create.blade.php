@extends('admin.layouts.app')

@section('title' , 'ویژگی های محصول')



@section('content')

    <div class="col-10 bg-white" style="margin: 50px auto">
        <p class="box__title"> ویژگی های محصول <b>{{ $product->name }}</b></p>
        @includeIf('admin.partials._errors')
        @if (session('success'))
            <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
        @endif


        <form action="{{ route('product.properties.store' , $product) }}" method="post" class="padding-30"/>
        @csrf

        @foreach ($propertyGroups as $group)
            <h4 class="text-info" style="margin-top: 10px">{{ $group->title }}</h4>

            <div class="row">
                @foreach ($group->properties as $property)
                    <div class="col-sm-6 form-group">

                        <div class="col-sm-2" style="padding-right: 10px">
                            <label for="title" style="font-size: 15px;margin-right: 10px">{{ $property->title }}</label>
                        </div>

                        <div class="col-sm-10 padding-0-18">
                            {{--  array2D -> properties[{{ $property->id }}][value]   میاد در قسمت اول ایدی زیرمجموعه مشخصات میگیره | دومی (ولیو) یا نوشته متن میگیره --}}
                            <input type="text" name="properties[{{ $property->id }}][value]" value="{{ $property->getValueForProduct($product) }}" id="title" class="text"/>
                        </div>

                    </div>
                @endforeach
            </div>

        @endforeach

        <button class="btn btn-brand" style="margin-top: 20px">اضافه کردن</button>
        </form>
    </div>

@endsection

