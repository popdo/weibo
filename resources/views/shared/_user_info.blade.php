<a class="mx-auto d-inline-block" href="{{ route('users.show', $user->id) }}">
    <img width="100" height="100" src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar o"/>
</a>
<h2 class="mt-2 mb-5">{{ $user->name }}</h2>
<div class="user_atten flex-xy-c mb-5">
    <dl class="item px-30">
        <dt class="num">{{ count($user->followings) }}</dt>
        <dd class="text-muted">关注</dd>
    </dl>
    <dl class="item px-30 border-left border-right">
        <dt class="num">{{ count($user->followers) }}</dt>
        <dd class="text-muted">粉丝</dd>
    </dl>
    <dl class="item px-30">
        <dt class="num">{{ $user->statuses()->count() }}</dt>
        <dd class="text-muted">微博</dd>
    </dl>
</div>