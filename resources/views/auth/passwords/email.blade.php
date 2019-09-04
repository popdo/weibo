@extends('layouts.default')
@section('title','重置密码')

@section('content')
<div class="col-md-8 offset-md-2">
  <div class="ibox mx-auto" style="max-width:400px">
    <div class="ibox-hd mb-3 text-center"><h4>重置密码</h4></div>

    <div class="ibox-bd">
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif

      <form class="" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email">邮箱地址：</label>
          <input id="email" type="email" class="form-item" name="email" value="{{ old('email') }}" required>

          @if ($errors->has('email'))
            <span class="form-text text-danger">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>

        <div class="field">
          <button type="submit" class="btn">
            发送密码重置邮件
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
