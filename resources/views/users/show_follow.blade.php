@extends('layouts.default')
@section('title',$title)

@section('content')
<div class="ibox">
    <div class="ibox-hd">
        <h5 class="title">{{ $title }}</h5>
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
