<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <h1>Detail</h1>
    <div>
        @if (session()->has('login') && session('login') == 'success')
            Login succesfull!
        @endif
    </div>
    <div>
        <p>
            <a href="{{ route('login') }}">Login</a>
        </p>
        <p>
            <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique
        nulla officia alias veniam. A, tempora?
        <a href="{{ route('test') }}">Test</a>
    </p>
</body>

</html>
