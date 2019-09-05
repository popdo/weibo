<div class="col-4">
    <div class="p-4 d-flex mb-4 border shadow-xs" style="border-color:#f1f1f1!important">
        <a class="align-self-center mr-3 " href="{{ route('users.show',$user) }}" style="flex:0 0 auto">
            <img class="o" src="{{ $user->gravatar(50) }}" alt="{{ $user->name }}">
        </a>
        <div style="flex:1 0 auto">
            <h6 class="title">{{ $user->name }}</h6>
            <div class="card-text flex-y-c">
                <small class="text-muted mr-auto">{{ $user->created_at->diffForHuMans() }}</small>
                @auth
                @include('users._follow_btn',[
                    'in_follow_btn' => 'is-success is-xs',
                    'in_unfollow_btn' => 'is-default is-xs'
                ])
                @endauth

                @can('destroy',$user)
                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn is-default is-xs ml-1">删除</button>
                </form>
                @endcan
            </div>
        </div>
    </div>
</div>