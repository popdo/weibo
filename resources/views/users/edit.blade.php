@extends('layouts.default')
@section('title','编辑个人资料')

@section('content')
<div class="ibox">
    <div class="ibox-hd">
        <h5 class="title">更新个人资料</h5>
    </div>
    <div class="ibox-bd row">
        <div class="col-2">
            <div class="mx-auto mt-3" style="width:100px">
                <img class="img-thumbnail" src="{{ $user->gravatar(140) }}" alt="{{ $user->name }}" width="100" height="100">
            </div>
        </div>
        <div class="col-10">
            @include('shared._errors')
            <form action="{{ route('users.update',$user->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="">名称</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">邮箱：</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                </div>

                <div class="form-group">
                    <label for="password">密码：</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">确认密码：</label>
                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                </div>

                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </div>
    </div>
</div>

@endsection
