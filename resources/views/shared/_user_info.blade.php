<a class="mx-auto d-inline-block" href="{{ route('users.show', $user->id) }}">
    <img width="100" height="100" src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar o"/>
</a>
<h2 class="mt-2 mb-3">{{ $user->name }}</h2>
<div class="follow_btn mb-5">
    @auth
        @include('users._follow_btn',[
            'in_follow_btn' => 'is-success',
            'in_unfollow_btn' => 'is-default'
        ])
    @endauth
</div>
<div class="user_atten flex-xy-c mb-5">
    <dl class="item px-30">
        <dt class="num">
            <a href="{{ route('users.followings',$user->id) }}">{{ count($user->followings) }}</a>
        </dt>
        <dd class="text-muted">关注</dd>
    </dl>
    <dl class="item px-30 border-left border-right">
        <dt class="num">
            <a href="{{ route('users.followers',$user->id) }}">{{ count($user->followers) }}</a>
        </dt>
        <dd class="text-muted">粉丝</dd>
    </dl>
    <dl class="item px-30">
        <dt class="num">
            <a href="{{ route('users.show',$user->id) }}">{{ $user->statuses()->count() }}</a>
        </dt>
        <dd class="text-muted">微博</dd>
    </dl>
</div>