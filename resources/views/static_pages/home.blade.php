@extends('layouts.default')
@section('title','首页')
@section('content')
<div class="row pt-3">
    <div class="col-sm-8">
        <section class="status_form">
            @include('statuses._status_form')
        </section>

        <section class="status_list">
            @if (count($feed_items)>0)
                <ul>
                    @foreach ($feed_items as $status)
                        @include('statuses._status_loop', ['user' => $status->user])
                    @endforeach
                </ul> 
                {{ $feed_items->links() }}
            @else
                <p class="text-center mt-5">请开始你的表演……</p>
            @endif
        </section>
    </div>
    <div class="col-sm-4">
        <section class="user_info text-center">
            @if (Auth::user())
                @include('shared._user_info', ['user' => Auth::user()])
            @else
                @include('shared._gust_info')
            @endif
        </section>
    </div>
</div>
@endsection

@section('script')

@endsection