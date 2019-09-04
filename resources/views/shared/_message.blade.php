@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))
        <div class="msg is-{{ $msg }} mb-3">
        <i class="icon"></i>
        {{ session()->get($msg) }}
        </div>
    @endif
@endforeach