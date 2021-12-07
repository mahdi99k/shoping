@if (session('success'))
    <div class="text-success text-center" style="margin-top: 10px">{{ session()->get('success') }}</div>
@endif


@if (session('update'))
    <div class="text-success text-center margin-bottom-10">{{ session()->get('update') }}</div>
@endif


@if (session('delete'))
    <div class="text-error text-center margin-bottom-10">{{ session('delete') }}</div>
@endif
