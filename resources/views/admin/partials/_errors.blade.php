@if ($errors->any())  {{-- اگر خطایی وجود داشت --}}
<div class="text-warning">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
