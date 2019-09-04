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
            <div class="p-4 d-flex mb-4 border shadow-xs" style="border-color:#f1f1f1!important">
                <a class="align-self-center mr-3 " href="{{ route('users.show',$user) }}" style="flex:0 0 auto">
                    <img class="o" src="{{ $user->gravatar(50) }}" alt="{{ $user->name }}">
                </a>
                <div style="flex:1 0 auto">
                    <h6 class="title">{{ $user->name }}</h6>
                    <div class="card-text">
                        <small class="text-muted">{{ $user->created_at->diffForHuMans() }}</small>
                        @can('destroy',$user)
                        <form action="{{ route('users.destroy',$user) }}" method="post" style="float:right;">
                            @csrf
                            @method('delete')
                            <button class="text-muted btn-space">delete</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if (count($users))
    <div class="ibox-ft mt-3 flex-x-c">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
