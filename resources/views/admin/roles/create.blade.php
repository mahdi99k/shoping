<div class="col-12 bg-white">
    <p class="box__title">ایجاد نقش جدید</p>

    @includeIf('admin.partials._errors')

    @if (session('success'))
        <div class="text-success text-center" style="margin-top: 10px">{{ session('success') }}</div>
    @endif

    <form action="{{ route('role.store') }}" method="post" class="padding-30">
        @csrf
        <input type="text" value="{{ old('title') }}" name="title" placeholder="عنوان نقش وارد نمایید" class="text"/>


        <div class="form-group">
            <label class="text-info"><strong>انتخاب مجوز دسترسی:</strong></label><br/><br/>

            <input type="radio" id="selectAll"/>فعال همه
            <input type="radio" id="disableAll" style="margin-right: 20px"/>غیر فعال همه


            <div class="row" style="margin: 10px 0">
                @foreach ($permissions as $permission)
                    <div class="padding-bottom-10" style="margin-right: 5px;">
                        <input type="checkbox" name="permissions[]" class="checkedAll" value="{{ $permission->id }}">  {{-- checkedAll فعال کردن همه یا برعکس --}}
                        <strong>{{ $permission->label }}</strong>{{--permissions[]به صورت آرایه--}}
                    </div>
                @endforeach
            </div>
        </div>


        <button class="btn btn-brand">افزودن نقش</button>
    </form>
</div>




@section('scripts')
    @include('admin.partials.checkbox')
@endsection
