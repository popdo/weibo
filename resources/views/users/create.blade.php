@extends('layouts.default')
@section('title','用户注册')
@section('content')
<div class="row">
<div class="offset-md-2 col-md-8">
  <div class="ibox mx-auto" style="max-width:400px">
    <div class="ibox-hd mb-3 text-center">
      <h4>账号注册</h4>
    </div>
    <div class="ibox-bd">
        @include('shared._errors')
      <form method="POST" action="{{ route('users.store') }}">
        @csrf
          <div class="field">
            <label for="name">名称：</label>
            <input type="text" name="name" class="form-item" value="{{ old('name') }}">
          </div>

          <div class="field">
            <label for="email">邮箱：</label>
            <input type="text" name="email" class="form-item" value="{{ old('email') }}">
          </div>

          <div class="field">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-item" value="{{ old('password') }}">
          </div>

          <div class="field">
            <label for="password_confirmation">确认密码：</label>
            <input type="password" name="password_confirmation" class="form-item" value="{{ old('password_confirmation') }}">
          </div>

          <button type="submit" class="btn btn-primary">注册</button>
      </form>
    </div>
  </div>
</div>     
</div>
@endsection

@section('script')

@endsection