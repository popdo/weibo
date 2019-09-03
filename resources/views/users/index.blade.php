@extends('layouts.default')

@section('title','用户列表')

@section('content')
<div class="ibox">
    <div class="ibox-hd">
        <h5 class="title">用户列表</h5>
    </div>
    <div class="ibox-bd row">
        @foreach ($users as $user)
        <div class="col-4">
            <div class="p-4 d-flex mb-4" style="border:1px solid #eee">
                <a class="align-self-center mr-3 " href="{{ route('users.show',$user) }}" style="flex:0 0 auto">
                    <img class="card-img-top img-thumbnail rounded" src="{{ $user->gravatar(50) }}" alt="{{ $user->name }}">
                </a>
                <div style="flex:1 0 auto">
                    <h6 class="title">{{ $user->name }}</h6>
                    <p class="card-text"><small class="text-muted">{{ $user->created_at->diffForHuMans() }}</small></p>
                </div>
            </div>
        </div>
        @endforeach
        @if (count($users))
            {{ $users->links() }}
        @endif
    </div>
</div>
@endsection
