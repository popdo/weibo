<li class="py-2 border-top">
    <div class="user-card">
        <a href="{{ route('users.show',$user->id) }}" class="u-face mr-2">
            <img width="50" height="50" src="{{ $user->gravatar(100) }}" alt="{{ $user->name }}" class="gravatar o"/>
        </a>
        <div class="u-info pt-1">
            <b class="name">jim</b>
            <small> / {{ $status->created_at->diffForHumans() }}</small>
            <p class="mt-15">{{ $status->content }}</p>
        </div>
        <!-- <span class="sr-only1">(current)</span> -->
    </div>
</li>