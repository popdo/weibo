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
        <div class="col-10 border-left">
            @include('shared._errors')
            <form action="{{ route('users.update',$user->id) }}" method="post" class="x-form">
                @csrf
                @method('patch')
                <div class="field">
                    <label class="x-label" for="">名称：</label>
                    <div class="field-bd">
                        <input type="text" name="name" class="form-item" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="field">
                    <label class="x-label" for="email">邮箱：</label>
                    <div class="field-bd">
                        <input type="text" name="email" class="form-item" value="{{ $user->email }}" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="x-label" for="password">密码：</label>
                    <div class="field-bd">
                        <input type="password" name="password" class="form-item" value="{{ old('password') }}">
                    </div>
                </div>

                <div class="field">
                    <label class="x-label" for="password_confirmation">确认密码：</label>
                    <div class="field-bd">
                        <input type="password" name="password_confirmation" class="form-item" value="{{ old('password_confirmation') }}">
                    </div>
                </div>
                <div class="field">
                    <label class="x-label"></label>
                    <div class="field-bd">
                        <button type="submit" class="btn">提交更新</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
