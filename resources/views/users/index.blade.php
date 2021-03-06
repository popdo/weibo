@extends('layouts.default')

@section('title','用户列表')

@section('content')
<div class="ibox">
    <div class="ibox-hd">
        <h5 class="title">用户列表</h5>
    </div>
    <div class="ibox-bd row">
        @foreach ($users as $user)
        
            @include('users._user_loop')

        @endforeach
    </div>
    @if (count($users))
    <div class="ibox-ft mt-3 flex-x-c">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
