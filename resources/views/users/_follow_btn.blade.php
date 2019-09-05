@can('follow',$user)
    @if (Auth::user()->isFollowing($user->id))
        <form action="{{ route('followers.destroy',$user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn {{ $in_unfollow_btn }}">取消关注</button>
        </form>
    @else
        <form action="{{ route('followers.store',$user->id) }}" method="post">
            @csrf
            <button class="btn {{ $in_follow_btn }}">关注</button>
        </form>
    @endif
@endcan