@if (session('successPassword'))
    <h4 class="alert alert-success text-center">{{ session('successPassword') }}</h4>
@endif


@if (session('successName'))
    <h4 class="alert alert-success text-center">{{ session('successName') }}</h4>
@endif
