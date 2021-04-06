@if(!empty($errors))
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    @endif
@endif
