<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>

<body>
    @if (session()->has('login') && session('login') == 'failed')
        <h3>Login failed!</h3>
    @endif

    @if (session()->has('logout'))
        <h3>{{ session('logout') }}</h3>
    @endif

    @if (session()->has('register'))
        {{ session('register') }}
    @endif

    {{-- Eğer auth varsa / guest ise aşağıdaki formu gösterir. --}}
    @guest
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    @endguest

    @auth
        <a href="{{ route('logout') }}">
            <button>Logout</button>
        </a>
    @endauth
</body>

</html>
