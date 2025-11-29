@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}?v={{ time() }}">
@endsection

@section('content')
<div class="register-container">
  <h2 class="register-title">Register</h2>

  {{-- 成功メッセージ --}}
  @if (session('success'))
  <p class="success-message">{{ session('success') }}</p>
  @endif
  
  <div class="register-box">
    <form action="/register" method="POST">
      @csrf

      <label class="form-label">お名前</label>
      @error('name')
      <p class="error-text">{{ $message }}</p>
      @enderror
      <input type="text" name="name" class="form-input" value="{{ old('name') }}">


      <label class="form-label">メールアドレス</label>
      @error('email')
      <p class="error-text">{{ $message }}</p>
      @enderror
      <input type="email" name="email" class="form-input" value="{{ old('email') }}">


      <label class="form-label">パスワード</label>
      @error('password')
      <p class="error-text">{{ $message }}</p>
      @enderror
      <input type="password" name="password" class="form-input">

      <button type="submit" class="submit-btn">登録</button>
    </form>
  </div>
</div>
@endsection