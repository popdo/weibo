@extends('layouts.default')
@section('content')
<div class="offset-md-2 col-md-8">
  <div class="ibox mx-auto" style="max-width:400px">
    <div class="ibox-hd text-center mb-3">
      <h4>账号登录</h4>
    </div>
    <div class="ibox-bd">
      @include('shared._errors')

      <form method="POST" action="{{ route('login') }}" class="">
          @csrf
          <div class="field">
            <label class="x-label" for="email">邮箱：</label>
            <input type="text" name="email" class="form-item" value="{{ old('email') }}">
          </div>

          <div class="field">
            <label for="password">密码：</label>
            <input type="password" name="password" class="form-item" value="{{ old('password') }}">
          </div>

          <div class="field">
            <div class="form-check">
              <input type="checkbox" class="is-checkbox is-info" name="remember" id="exampleCheck1">
              <label class="" for="exampleCheck1">记住我 （<a href="{{ route('password.request') }}">忘记密码?</a>）</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">登录</button>
      </form>

      <hr>

      <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
    </div>
  </div>
</div>
@endsection

