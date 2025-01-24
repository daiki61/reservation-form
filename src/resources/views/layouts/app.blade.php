<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitise.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        @if (Auth::check())
        <div class="header_inner">
            <a class="page__button" href="/">Rese</a>
        </div>
        @endif
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>