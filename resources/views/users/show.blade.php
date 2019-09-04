@extends('layouts.default')
@section('title',$user->name)

@section('content')
<div class="row">
    <section class="user_info mx-auto">
        @include('shared._user_info', ['user' => $user])
    </section>
    <section class="status">
        <ul class="list-unstyled">
        @if (count($statuses)>0)
            @foreach ($statuses as $status)
                @include('statuses._status_loop',['status'=>$status])
            @endforeach
        @else
            <li class="media">
                没有任何数据
            </li>
        @endif
        </ul>
        <div class="mt-5">
            {{ $statuses->links() }}
        </div>
    </section>
</div>
@endsection

@section('script')

@endsection