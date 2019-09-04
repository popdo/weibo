<li class="py-2 border-bottom">
    <div class="user-card">
        <a href="{{ route('users.show',$user->id) }}" class="u-face mr-2">
            <img width="50" height="50" src="{{ $user->gravatar(100) }}" alt="{{ $user->name }}" class="gravatar o"/>
        </a>
        <div class="u-info pt-1 mr-auto">
            <b class="name">jim</b>
            <small> / {{ $status->created_at->diffForHumans() }}</small>
            <p class="mt-15">{{ $status->content }}</p>
        </div>
        @can('destroy', $status)
        <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('您确定要删除本条微博吗？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="close ml-3 text-black-50" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </form>
        @endcan
        <!-- <span class="sr-only1">(current)</span> -->
    </div>
</li>