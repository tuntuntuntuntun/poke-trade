<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon Trades</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('styles')
</head>
<body>
    <header class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('posts.index') }}">ポケモントレード</a>
            <div>
                @if(Auth::check())
                    <a href="{{ route('mypage') }}" class="my-navbar-item text-secondary">{{ Auth::user()->name }}さんのマイページ</a>
                    |
                    <a href="{{ route('posts.search') }}" class="text-secondary">検索</a>
                    |
                    <a href="{{ route('posts.create') }}" class="text-secondary">投稿する</a>
                    |
                    <a href="#" id="logout" class="mybar-item">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display:none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('posts.search') }}" class="text-secondary">検索</a>
                    |
                    <a id="login" class="mybar-item" href="{{ route('login') }}">ログイン</a>
                    |
                    <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
                @endif
            </div>
        </nav>
    </header>
    @yield('content')

    @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>
    @endif
</body>
</html>