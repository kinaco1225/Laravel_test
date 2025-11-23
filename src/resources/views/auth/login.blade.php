@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="login-container">

  <h2 class="login-title">Login</h2>
  <div class="login-box">
    {{-- 登録成功メッセージ --}}
    @if (session('success'))
    <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="/login" method="POST">
      @csrf

      <label class="form-label">メールアドレス</label>
      @error('email')
      <p class="error-text">{{ $message }}</p>
      @enderror
      <input class="form-input" type="email" name="email" value="{{old('email')}}" placeholder="メールアドレス">

      <label class="form-label">パスワード</label>
      @error('password')
      <p class="error-text">{{ $message }}</p>
      @enderror
      <input class="form-input" type="password" name="password" placeholder="パスワード">

      <button type="submit" class="submit-btn">ログイン</button>
    </form>
  </div>
</div>
@endsection