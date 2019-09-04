<li class="media">
    <a href="{{ route('users.show',$user->id) }}" class="2">
        <img src="{{ $user->gravatar(64) }}" alt="{{ $user->name }}" class="mr-3 gravatar"/>
    </a>
    <div class="media-body">
        <h5 class="mt-0 mb-1">
            {{ $user->name }} 
            <small> / {{ $status->created_at->diffForHumans() }}</small>
        </h5>
        {{ $status->content }}
    </div>
</li>