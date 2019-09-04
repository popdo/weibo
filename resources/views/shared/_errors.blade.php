@if (count($errors)>0)
    <div class="msg is-danger my-2">
        <i class="icon"></i>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{-- {{ $errors->first() }} --}}
    </div>
@endif