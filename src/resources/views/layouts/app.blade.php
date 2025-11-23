<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @if (request()->is('/'))
  <title>Contact</title>
  @elseif (request()->is('register'))
  <title>Register</title>
  @elseif (request()->is('login'))
  <title>Login</title>
  @elseif (request()->is('admin') || request()->is('admin/*'))
  <title>Admin</title>
  @endif

  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}?v={{ time() }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}?v={{ time() }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a href="/" class="header-logo">
        FashionablyLate
      </a>
    </div>

    <div class="header__right">
      @if (request()->is('register'))
      <a href="{{ route('login') }}" class="header-btn">login</a>
      @elseif (request()->is('login'))
      <a href="{{ route('register') }}" class="header-btn">register</a>
      @elseif (request()->is('admin') || request()->is('admin/*'))
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="header-btn">logout</button>
      </form>
      @endif
    </div>

  </header>
  <main>
    @yield('content')
  </main>
</body>

</html>