@extends('layouts.default')
@section('title','重设密码')

@section('content')
<div class="offset-md-1 col-md-10">
  <div class="ibox">
    <div class="ibox-hd mx-auto mb-3">
        <h4>更新密码</h4>
    </div>

    <div class="ibox-bd">
      <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="field">
          <label for="email">Email 地址</label>
            <input id="email" type="email" class="form-item{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

            @if ($errors->has('email'))
            <span class="msg is-danger">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <div class="field">
          <label for="password" class="col-md-4 col-form-label text-md-right">密码</label>
            <input id="password" type="password" class="form-item{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
            <span class="msg is-danger">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>

        <div class="field">
          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">确认密码</label>
          <input id="password-confirm" type="password" class="form-item" name="password_confirmation" required>
        </div>

        <div class="field">
            <button type="submit" class="btn is-primary">
                重置密码
              </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
